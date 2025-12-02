<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExpertSystem\ForwardChainingService;

class DiagnosisController extends Controller
{
    public function proses(Request $request, ForwardChainingService $service)
    {
        $selectedGejala = $request->input('gejala', []);

        $hasil = $service->diagnose($selectedGejala);

        return view('diagnosis.hasil', compact('hasil'));
    }
}
