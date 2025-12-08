<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $gejala = [
            ['kode' => 'G001', 'nama' => 'Bersin-bersin'],
            ['kode' => 'G002', 'nama' => 'Mata berair'],
            ['kode' => 'G003', 'nama' => 'Hidung berlendir'],
            ['kode' => 'G004', 'nama' => 'Demam'],
            ['kode' => 'G005', 'nama' => 'Nafsu makan turun'],

            ['kode' => 'G006', 'nama' => 'Muntah hebat'],
            ['kode' => 'G007', 'nama' => 'Diare berdarah'],
            ['kode' => 'G008', 'nama' => 'Dehidrasi'],
            ['kode' => 'G009', 'nama' => 'Lesu parah'],

            ['kode' => 'G010', 'nama' => 'Gatal ekstrem'],
            ['kode' => 'G011', 'nama' => 'Kerak pada telinga'],
            ['kode' => 'G012', 'nama' => 'Rambut rontok'],
            ['kode' => 'G013', 'nama' => 'Kulit merah'],

            ['kode' => 'G014', 'nama' => 'Rontok melingkar'],
            ['kode' => 'G015', 'nama' => 'Kulit bersisik'],
            ['kode' => 'G016', 'nama' => 'Gatal ringan'],

            ['kode' => 'G017', 'nama' => 'Minum berlebihan'],
            ['kode' => 'G018', 'nama' => 'Sering pipis'],
            ['kode' => 'G019', 'nama' => 'Berat badan turun'],

            ['kode' => 'G020', 'nama' => 'Bau mulut amonia'],

            ['kode' => 'G021', 'nama' => 'Mengejan'],
            ['kode' => 'G022', 'nama' => 'Feses keras'],
            ['kode' => 'G023', 'nama' => 'Perut buncit'],

            ['kode' => 'G024', 'nama' => 'BAB cair'],
            ['kode' => 'G025', 'nama' => 'Perut keroncongan'],

            ['kode' => 'G026', 'nama' => 'Cacing terlihat'],
            ['kode' => 'G027', 'nama' => 'Muntah cacing'],

            ['kode' => 'G028', 'nama' => 'Anemia'],
            ['kode' => 'G029', 'nama' => 'Infeksi berulang'],
            ['kode' => 'G030', 'nama' => 'Penurunan berat badan'],

            ['kode' => 'G031', 'nama' => 'Nanah keluar'],
            ['kode' => 'G032', 'nama' => 'Perut membesar'],
            ['kode' => 'G033', 'nama' => 'Napas berat'],

            ['kode' => 'G034', 'nama' => 'Benjolan merah keluar'],
            ['kode' => 'G035', 'nama' => 'Darah/lendir pada anus'],
        ];

        foreach ($gejala as $g) {
            Gejala::updateOrCreate(['kode' => $g['kode']], $g);
        }
    }
}
