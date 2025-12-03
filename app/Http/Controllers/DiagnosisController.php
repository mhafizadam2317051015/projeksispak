<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExpertSystem\ForwardChainingService;

class DiagnosisController extends Controller
{
    public function proses(Request $request, ForwardChainingService $service)
    {
        $selectedGejala = $request->input('gejala', []);

        // pastikan format array dan bersih
        if (!is_array($selectedGejala)) {
            // form mungkin kirim string "G001,G002"
            $selectedGejala = explode(',', (string)$selectedGejala);
        }
        $selectedGejala = array_filter(array_map('trim', $selectedGejala));

        $hasil = $service->diagnose($selectedGejala); // akan return single result array atau null

        // agar blade konsisten (kita kirim array kosong jika null)
        if ($hasil === null) {
            return view('diagnosis.hasil', ['hasil' => []]);
        }

        // kirim sebagai array berisi satu elemen supaya loop di blade tetap mudah
        return view('diagnosis.hasil', ['hasil' => [$hasil]]);
    }
}
