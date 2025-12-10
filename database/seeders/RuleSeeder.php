<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [

            // ========================================
            // P001 - PANLEUKOPENIA
            // ========================================
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G001'], // Demam tinggi
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G011'], // Muntah berulang
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G012'], // Diare cair
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G013'], // Diare berdarah
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G002'], // Lemas ekstrem
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G003'], // Tidak mau makan
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G004'], // Bulu kusam
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G005'], // Mata cekung
            ['penyakit_kode' => 'P001', 'gejala_kode' => 'G090'], // Dehidrasi berat

            // ========================================
            // P002 - ISPA / URTI
            // ========================================
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G020'], // Bersin
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G021'], // Batuk
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G022'], // Pilek / ingusan
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G023'], // Nafas berbunyi / sesak
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G024'], // Mata berair / bernanah
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G003'], // Tidak mau makan
            ['penyakit_kode' => 'P002', 'gejala_kode' => 'G025'], // Mata bengkak besar

            // ========================================
            // P003 - GASTROENTERITIS
            // ========================================
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G010'], // Muntah
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G012'], // Diare cair
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G014'], // Perut kembung
            ['penyakit_kode' => 'P003', 'gejala_kode' => 'G002'], // Lemas

            // ========================================
            // P004 - CACINGAN
            // ========================================
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G012'], // Diare berulang
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G096'], // Muntah keluar cacing
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G097'], // Perut buncit tapi kurus
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G004'], // Bulu kusam
            ['penyakit_kode' => 'P004', 'gejala_kode' => 'G091'], // Gusi pucat

            // ========================================
            // P005 - FLUTD / BATU GINJAL
            // ========================================
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G050'], // Pipis sedikit-sedikit
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G053'], // Sering mengejan saat pipis
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G051'], // Pipis berdarah
            ['penyakit_kode' => 'P005', 'gejala_kode' => 'G052'], // Tidak bisa pipis

            // ========================================
            // P006 - JAMUR KULIT / RINGWORM
            // ========================================
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G040'], // Kerontokan bulu pola lingkaran
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G041'], // Kulit merah & bersisik
            ['penyakit_kode' => 'P006', 'gejala_kode' => 'G042'], // Gatal ekstrem

            // ========================================
            // P007 - FCV (FELINE CALICIVIRUS)
            // ========================================
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G030'], // Luka mulut / sariawan
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G031'], // Air liur berlebihan
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G001'], // Demam
            ['penyakit_kode' => 'P007', 'gejala_kode' => 'G032'], // Tidak mampu makan

            // ========================================
            // P008 - RABIES
            // ========================================
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G070'], // Agresif / galak ekstrem
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G071'], // Takut air
            ['penyakit_kode' => 'P008', 'gejala_kode' => 'G072'], // Lumpuh / kejang

            // ========================================
            // P009 - FIV
            // ========================================
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G007'], // Penurunan berat badan
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G030'], // Sariawan mulut
            ['penyakit_kode' => 'P009', 'gejala_kode' => 'G024'], // Infeksi berulang (mata berair/bernanah)

            // ========================================
            // P010 - FELV
            // ========================================
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G007'], // Penurunan berat badan
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G024'], // Infeksi berulang (mata berair)
            ['penyakit_kode' => 'P010', 'gejala_kode' => 'G003'], // Tidak mau makan

            // ========================================
            // P011 - SCABIES / KUDIS
            // ========================================
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G042'], // Gatal ekstrem
            ['penyakit_kode' => 'P011', 'gejala_kode' => 'G043'], // Kerak tebal di telinga & wajah

            // ========================================
            // P012 - OTITIS / TUNGAU TELINGA
            // ========================================
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G044'], // Kotoran telinga hitam
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G095'], // Bau busuk dari telinga
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G092'], // Menggeleng kepala terus
            ['penyakit_kode' => 'P012', 'gejala_kode' => 'G093'], // Kepala miring

            // ========================================
            // P013 - PYOMETRA
            // ========================================
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G060'], // Nanah keluar dari vagina
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G061'], // Perut membesar
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G001'], // Demam
            ['penyakit_kode' => 'P013', 'gejala_kode' => 'G010'], // Muntah

            // ========================================
            // P014 - MASTITIS
            // ========================================
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G062'], // Puting bengkak, merah & panas
            ['penyakit_kode' => 'P014', 'gejala_kode' => 'G063'], // Susu bercampur nanah

            // ========================================
            // P015 - OBSTRUKSI USUS
            // ========================================
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G010'], // Muntah terus menerus
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G016'], // Tidak buang air besar
            ['penyakit_kode' => 'P015', 'gejala_kode' => 'G014'], // Perut keras & kesakitan

            // ========================================
            // P016 - FIP
            // ========================================
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G061'], // Perut membesar (wet FIP)
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G001'], // Demam berulang
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G006'], // Nafas berat
            ['penyakit_kode' => 'P016', 'gejala_kode' => 'G094'], // Mata menguning

            // ========================================
            // P017 - PROLAPSUS REKTUM
            // ========================================
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G080'], // Benjolan merah keluar dari anus
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G081'], // Darah/lendir keluar dari anus
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G015'], // Kesulitan BAB / mengejan
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G082'], // Menjilati/menggigit area anus
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G003'], // Nafsu makan menurun
            ['penyakit_kode' => 'P017', 'gejala_kode' => 'G002'], // Lesu / tidak aktif

        ];

        DB::table('rules')->insert($rules);
    }
}