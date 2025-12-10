<?php

namespace App\Services\ExpertSystem;

use App\Python\PythonExecutor;
use App\Models\Rule;
use App\Models\Penyakit;

class ForwardChainingService
{
    protected PythonExecutor $python;

    public function __construct(PythonExecutor $python)
    {
        $this->python = $python;
    }

    /**
     * Helper method untuk get grouped data penyakit
     */
    private function getGroupedPenyakit()
    {
        $rules = Rule::with('penyakit')->get();
        $grouped = [];
        
        foreach ($rules as $r) {
            $pKode = $r->penyakit_kode;
            $gKode = $r->gejala_kode;

            if (!isset($grouped[$pKode])) {
                $nama = $r->penyakit?->nama ?? Penyakit::where('kode', $pKode)->value('nama') ?? $pKode;
                $grouped[$pKode] = [
                    'kode' => $pKode,
                    'nama' => $nama,
                    'gejala' => [],
                ];
            }

            if ($gKode && !in_array($gKode, $grouped[$pKode]['gejala'])) {
                $grouped[$pKode]['gejala'][] = $gKode;
            }
        }
        
        return $grouped;
    }

    /**
     * Helper method untuk run python dan parse hasil
     */
    private function runDiagnosis(array $selectedGejala, array $grouped)
    {
        $payload = [
            'gejala' => array_values($selectedGejala),
            'diseases' => array_values($grouped),
        ];

        $scriptPath = base_path('python/forward_engine.py');
        $out = $this->python->runPython($scriptPath, $payload);
 //dd($payload); 
        if (empty($out)) {
            return null;
        }

        $decoded = json_decode($out, true);
        if (!$decoded || !isset($decoded['hasil']) || !is_array($decoded['hasil'])) {
            return null;
        }

        return $decoded['hasil'];
    }

    /**
     * $selectedGejala: array of kode gejala, e.g. ['G001','G013']
     * return: array|null (single best result) OR null if none
     */
    public function diagnose(array $selectedGejala)
    {
        $grouped = $this->getGroupedPenyakit();
        
        if (empty($grouped)) {
            return null;
        }

        $hasilList = $this->runDiagnosis($selectedGejala, $grouped);
        
        if ($hasilList === null || count($hasilList) === 0) {
            return null;
        }

        // ambil hasil terbaik (pertama sudah terurut dari python)
        $best = $hasilList[0];

        // pastikan keys ada (kode, nama, persentase, jumlah)
        $result = [
            'kode' => $best['kode'] ?? ($best['penyakit_kode'] ?? '-'),
            'penyakit' => $best['nama'] ?? ($best['penyakit'] ?? '-'),
            'persentase' => isset($best['persentase']) ? round($best['persentase'], 2) : 0,
            'jumlah' => isset($best['jumlah']) ? (int)$best['jumlah'] : (isset($best['matched']) ? (int)$best['matched'] : 0),
            'matched' => isset($best['matched']) ? (int)$best['matched'] : 0,
        ];
      
        return $result;
    }

    /**
     * Diagnose dan return semua hasil, bukan hanya satu
     */
    public function diagnoseAll(array $selectedGejala)
    {
        $grouped = $this->getGroupedPenyakit();
        
        if (empty($grouped)) {
            return [];
        }

        $hasilList = $this->runDiagnosis($selectedGejala, $grouped);
        
        if ($hasilList === null || count($hasilList) === 0) {
            return [];
        }

        // Konversi semua hasil
        $allResults = [];
        
        foreach ($hasilList as $item) {
            $result = [
                'kode' => $item['kode'] ?? ($item['penyakit_kode'] ?? '-'),
                'nama' => $item['nama'] ?? ($item['penyakit'] ?? '-'),
                'penyakit' => $item['nama'] ?? ($item['penyakit'] ?? '-'),
                'persentase' => isset($item['persentase']) ? round($item['persentase'], 2) : 0,
                'jumlah' => isset($item['jumlah']) ? (int)$item['jumlah'] : (isset($item['matched']) ? (int)$item['matched'] : 0),
                'matched' => isset($item['matched']) ? (int)$item['matched'] : 0,
                'total_input_user' => $item['total_input_user'] ?? 0,
                'total_gejala_penyakit' => $item['total_gejala_penyakit'] ?? 0,
            ];
            $allResults[] = $result;
        }
        //dd($allResults);
 //dd($hasilList);       
        return $allResults;
    }

    /**
     * Debug method untuk lihat semua persentase
     */
    public function debugDiagnosis(array $selectedGejala)
    {
        $grouped = $this->getGroupedPenyakit();
        
        if (empty($grouped)) {
            return ['error' => 'No grouped data'];
        }

        $hasilList = $this->runDiagnosis($selectedGejala, $grouped);
        
        if ($hasilList === null) {
            return ['error' => 'Python execution failed'];
        }

        return [
            'input_gejala' => $selectedGejala,
            'total_input' => count($selectedGejala),
            'grouped_data' => $grouped,
            'semua_hasil' => $hasilList,
            'count' => count($hasilList),
            'terbaik' => $hasilList[0] ?? null,
        ];
    }

}