<?php

namespace App\Python;

class PythonExecutor
{
    public function runPython(string $scriptPath, array $payload)
{
    $json = json_encode($payload);

    // simpan sementara
    $temp = storage_path('app/payload.json');
    file_put_contents($temp, $json);

    // kirim path file, bukan isi JSON
    $command = "python3 $scriptPath $temp";

    return shell_exec($command);
}

}
