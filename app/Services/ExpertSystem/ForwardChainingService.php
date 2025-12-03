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
     * $selectedGejala: array of kode gejala, e.g. ['G001','G013']
     * return: array|null (single best result) OR null if none
     */
    public function diagnose(array $selectedGejala)
    {
        // ambil semua rule + penyakit (pastikan Rule model punya relasi penyakit)
        $rules = Rule::with('penyakit')->get();

        // group rules by penyakit_kode -> collect gejala codes unique
        $grouped = [];
        foreach ($rules as $r) {
            $pKode = $r->penyakit_kode;
            $gKode = $r->gejala_kode;

            if (!isset($grouped[$pKode])) {
                // ambil nama penyakit dari relasi apabila tersedia
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

        // jika tidak ada grouped (mis. table rules kosong) -> return null
        if (empty($grouped)) {
            return null;
        }

        // siapkan payload untuk python: gejala (user) & diseases (grouped)
        $payload = [
            'gejala' => array_values($selectedGejala),
            'diseases' => array_values($grouped),
        ];

        // jalankan python engine
        $scriptPath = base_path('python/forward_engine.py');
        $out = $this->python->runPython($scriptPath, $payload);

        if (empty($out)) {
            return null;
        }

        // parse output JSON
        $decoded = json_decode($out, true);
        if (!$decoded || !isset($decoded['hasil']) || !is_array($decoded['hasil'])) {
            return null;
        }

        $hasilList = $decoded['hasil'];

        // jika tidak ada hasil
        if (count($hasilList) === 0) {
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
        ];

        return $result;
    }
}
