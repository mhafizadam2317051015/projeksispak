<?php

namespace App\Services\ExpertSystem;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Python\PythonExecutor;

class ForwardChainingService
{
    protected $python;

    public function __construct(PythonExecutor $python)
    {
        $this->python = $python;
    }

    public function diagnose(array $selectedGejala)
    {
        $rules = Rule::all();
        $penyakit = Penyakit::all();

        $payload = [
            "gejala" => $selectedGejala,
            "rules" => $rules->toArray(),
            "penyakit" => $penyakit->toArray()
        ];

        $result = $this->python->runPython(base_path('python/forward_engine.py'), $payload);

        return json_decode($result, true);
    }
}
