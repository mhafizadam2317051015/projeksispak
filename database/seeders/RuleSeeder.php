<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [
            // Panleukopenia
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G001'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G003'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G006'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G007'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G008'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G005'],

            // ISPA
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G011'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G012'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G013'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G014'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G015'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G016'],

            // Gastroenteritis
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G002'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G006'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G020'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G016'],

            // Cacingan
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G023'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G002'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G024'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G025'],

            // FLUTD
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G057'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G058'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G059'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G061'],

            // Ringworm
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G029'],
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G030'],
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G031'],

            // FCV
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G017'],
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G018'],
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G001'],

            // Rabies
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G046'],
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G047'],
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G048'],

            // FIV
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G026'],
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G055'],
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G024'],

            // FeLV
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G025'],
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G024'],
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G026'],

            // Scabies
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G031'],
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G032'],
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G062'],

            // Otitis
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G033'],
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G034'],
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G035'],

            // Pyometral
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G036'],
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G001'],

            // Mastitis
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G038'],
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G039'],
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G040'],

            // Obstruksi usus
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G042'],
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G043'],
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G044'],

            // FIP
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G037'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G001'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G075'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G076'],

            // Prolapsus Rektum
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G050'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G051'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G052'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G083']
        ];

        DB::table('rules')->insert($rules);
    }
}
