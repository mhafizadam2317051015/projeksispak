<?php

namespace App\Python;

class PythonExecutor
{
    /**
     * Jalankan script python dengan payload array.
     * Mengembalikan stdout (string) atau null jika gagal.
     */
    public function runPython(string $scriptPath, array $payload)
    {
        // encode payload
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE);

        // buat file sementara di storage/app/
        $filename = 'payload_' . time() . '_' . bin2hex(random_bytes(6)) . '.json';
        $temp = storage_path('app/' . $filename);

        if (false === @file_put_contents($temp, $json)) {
            // gagal menulis file
            return null;
        }

        // gunakan escapeshellarg untuk aman
        $scriptArg = escapeshellarg($scriptPath);
        $fileArg = escapeshellarg($temp);

        // jalankan python (pastikan python3 ada)
        $command = "python3 $scriptArg $fileArg 2>&1";

        // jalankan dan ambil output
        $output = shell_exec($command);

        // optional: hapus file sementara (jika ingin menyimpan untuk debug, jangan hapus)
        @unlink($temp);

        return $output;
    }
}
