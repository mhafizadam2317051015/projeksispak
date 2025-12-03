<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [

            // P001 - Panleukopenia
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G001'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G011'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G012'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G013'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G002'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G003'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G004'],
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G005'],

            // P002 - ISPA
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G020'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G021'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G022'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G023'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G024'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G003'],
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G025'],

            // P003 - Gastroenteritis
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G010'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G012'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G014'],
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G002'],

            // P004 - Cacingan
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G012'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G010'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G014'],
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G007'],

            // P005 - FLUTD
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G050'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G053'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G051'],
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G052'],

            // P006 - Ringworm
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G040'],
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G041'],
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G042'],

            // P007 - FCV
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G030'],
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G031'],
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G001'],
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G032'],

            // P008 - Rabies
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G070'],
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G071'],
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G072'],

            // P009 - FIV
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G007'],
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G030'],
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G024'],

            // P010 - FeLV
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G007'],
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G024'],
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G003'],

            // P011 - Scabies
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G042'],
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G043'],
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G045'],

            // P012 - Otitis
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G044'],
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G072'],
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G033'],

            // P013 - Pyometra
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G060'],
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G061'],
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G001'],

            // P014 - Mastitis
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G062'],
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G063'],

            // P015 - Obstruksi Usus
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G010'],
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G016'],
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G014'],

            // P016 - FIP
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G061'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G001'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G006'],
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G035'],

            // P017 - Prolapsus Rektum
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G080'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G081'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G015'],
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G082'],

        ];

        DB::table('rules')->insert($rules);
    }
}
