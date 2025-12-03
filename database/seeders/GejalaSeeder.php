<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $gejala = [

            // A. Sistemik
            ['kode' => 'G001', 'nama' => 'Demam tinggi', 'kategori' => 'A'],
            ['kode' => 'G002', 'nama' => 'Lemas ekstrem', 'kategori' => 'A'],
            ['kode' => 'G003', 'nama' => 'Tidak mau makan', 'kategori' => 'A'],
            ['kode' => 'G004', 'nama' => 'Bulu kusam', 'kategori' => 'A'],
            ['kode' => 'G005', 'nama' => 'Mata cekung', 'kategori' => 'A'],
            ['kode' => 'G006', 'nama' => 'Nafas berat', 'kategori' => 'A'],
            ['kode' => 'G007', 'nama' => 'Penurunan berat badan', 'kategori' => 'A'],

            // B. Pencernaan
            ['kode' => 'G010', 'nama' => 'Muntah', 'kategori' => 'B'],
            ['kode' => 'G011', 'nama' => 'Muntah berulang', 'kategori' => 'B'],
            ['kode' => 'G012', 'nama' => 'Diare cair', 'kategori' => 'B'],
            ['kode' => 'G013', 'nama' => 'Diare berdarah', 'kategori' => 'B'],
            ['kode' => 'G014', 'nama' => 'Perut kembung', 'kategori' => 'B'],
            ['kode' => 'G015', 'nama' => 'Kesulitan BAB', 'kategori' => 'B'],
            ['kode' => 'G016', 'nama' => 'Tidak BAB sama sekali', 'kategori' => 'B'],

            // C. Pernapasan
            ['kode' => 'G020', 'nama' => 'Bersin', 'kategori' => 'C'],
            ['kode' => 'G021', 'nama' => 'Batuk', 'kategori' => 'C'],
            ['kode' => 'G022', 'nama' => 'Pilek / ingusan', 'kategori' => 'C'],
            ['kode' => 'G023', 'nama' => 'Nafas berbunyi / sesak', 'kategori' => 'C'],
            ['kode' => 'G024', 'nama' => 'Mata berair / bernanah', 'kategori' => 'C'],
            ['kode' => 'G025', 'nama' => 'Mata bengkak besar', 'kategori' => 'C'],

            // D. Mulut & Hidung
            ['kode' => 'G030', 'nama' => 'Luka mulut / sariawan', 'kategori' => 'D'],
            ['kode' => 'G031', 'nama' => 'Air liur berlebihan', 'kategori' => 'D'],
            ['kode' => 'G032', 'nama' => 'Tidak mampu makan', 'kategori' => 'D'],
            ['kode' => 'G033', 'nama' => 'Hidung tersumbat', 'kategori' => 'D'],

            // E. Kulit & Bulu
            ['kode' => 'G040', 'nama' => 'Kerontokan bulu pola lingkaran', 'kategori' => 'E'],
            ['kode' => 'G041', 'nama' => 'Kulit merah & bersisik', 'kategori' => 'E'],
            ['kode' => 'G042', 'nama' => 'Gatal ekstrem', 'kategori' => 'E'],
            ['kode' => 'G043', 'nama' => 'Kerak tebal pada telinga/wajah', 'kategori' => 'E'],
            ['kode' => 'G044', 'nama' => 'Kotoran telinga hitam seperti bubuk kopi', 'kategori' => 'E'],

            // F. Perkemihan
            ['kode' => 'G050', 'nama' => 'Pipis sedikit-sedikit', 'kategori' => 'F'],
            ['kode' => 'G051', 'nama' => 'Pipis berdarah', 'kategori' => 'F'],
            ['kode' => 'G052', 'nama' => 'Tidak bisa pipis', 'kategori' => 'F'],
            ['kode' => 'G053', 'nama' => 'Sering mengejan saat pipis', 'kategori' => 'F'],

            // G. Reproduksi
            ['kode' => 'G060', 'nama' => 'Nanah keluar dari vagina', 'kategori' => 'G'],
            ['kode' => 'G061', 'nama' => 'Perut membesar', 'kategori' => 'G'],
            ['kode' => 'G062', 'nama' => 'Puting bengkak & panas', 'kategori' => 'G'],
            ['kode' => 'G063', 'nama' => 'Susu bercampur nanah', 'kategori' => 'G'],

            // H. Saraf / Perubahan Perilaku
            ['kode' => 'G070', 'nama' => 'Agresif / galak ekstrem', 'kategori' => 'H'],
            ['kode' => 'G071', 'nama' => 'Takut air', 'kategori' => 'H'],
            ['kode' => 'G072', 'nama' => 'Lumpuh / kejang', 'kategori' => 'H'],

            // I. Anus / Rektum (Prolapsus)
            ['kode' => 'G080', 'nama' => 'Benjolan merah keluar dari anus', 'kategori' => 'I'],
            ['kode' => 'G081', 'nama' => 'Darah/lendir keluar dari anus', 'kategori' => 'I'],
            ['kode' => 'G082', 'nama' => 'Menjilati / menggigit anus', 'kategori' => 'I'],
        ];

        DB::table('gejala')->insert($gejala);
    }
}
