<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $penyakit = [
            ['kode' => 'P001', 'nama' => 'Panleukopenia'],
            ['kode' => 'P002', 'nama' => 'ISPA / URTI'],
            ['kode' => 'P003', 'nama' => 'Gastroenteritis'],
            ['kode' => 'P004', 'nama' => 'Cacingan'],
            ['kode' => 'P005', 'nama' => 'FLUTD / Batu Ginjal'],
            ['kode' => 'P006', 'nama' => 'Jamur Kulit / Ringworm'],
            ['kode' => 'P007', 'nama' => 'FCV (Feline Calicivirus)'],
            ['kode' => 'P008', 'nama' => 'Rabies'],
            ['kode' => 'P009', 'nama' => 'FIV'],
            ['kode' => 'P010', 'nama' => 'FeLV'],
            ['kode' => 'P011', 'nama' => 'Scabies / Kudis'],
            ['kode' => 'P012', 'nama' => 'Otitis / Tungau Telinga'],
            ['kode' => 'P013', 'nama' => 'Pyometral'],
            ['kode' => 'P014', 'nama' => 'Mastitis'],
            ['kode' => 'P015', 'nama' => 'Obstruksi Usus'],
            ['kode' => 'P016', 'nama' => 'FIP'],
            ['kode' => 'P017', 'nama' => 'Prolapsus Rektum']
        ];

        DB::table('penyakit')->insert($penyakit);
    }
}
