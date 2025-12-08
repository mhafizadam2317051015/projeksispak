<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;
use App\Models\Gejala;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        // ==============================
        // DATA PENYAKIT (17 PENYAKIT)
        // ==============================
        $data = [
            [
                'kode' => 'P001',
                'nama' => 'Flu Kucing (URI)',
                'presentasi' => 'Infeksi saluran pernapasan atas.',
                'deskripsi' => 'Pilek, bersin, mata berair.',
                'perilaku_penyebab' => 'Virus calicivirus/herpes.',
                'penanganan_mandiri' => 'Uap hangat & bersihkan lendir.',
                'saran_bawa_dokter' => 'Jika sesak/pus tebal.',
            ],
            [
                'kode' => 'P002',
                'nama' => 'Panleukopenia',
                'presentasi' => 'Virus mematikan.',
                'deskripsi' => 'Muntah, diare darah, dehidrasi.',
                'perilaku_penyebab' => 'Parvovirus.',
                'penanganan_mandiri' => 'Tidak ada—darurat.',
                'saran_bawa_dokter' => 'Segera ke dokter.',
            ],
            [
                'kode' => 'P003',
                'nama' => 'Scabies',
                'presentasi' => 'Tungau penyebab gatal ekstrem.',
                'deskripsi' => 'Kerak & rontok.',
                'perilaku_penyebab' => 'Kontak dengan tungau.',
                'penanganan_mandiri' => 'Sulfur & disinfeksi.',
                'saran_bawa_dokter' => 'Perlu ivermectin.',
            ],
            [
                'kode' => 'P004',
                'nama' => 'Jamur Kulit',
                'presentasi' => 'Ringworm.',
                'deskripsi' => 'Bercak botak melingkar.',
                'perilaku_penyebab' => 'Lingkungan lembab.',
                'penanganan_mandiri' => 'Antijamur topikal.',
                'saran_bawa_dokter' => 'Jika menyebar.',
            ],
            [
                'kode' => 'P005',
                'nama' => 'Alergi Gigitan Kutu',
                'presentasi' => 'Reaksi alergi kutu.',
                'deskripsi' => 'Gatal parah.',
                'perilaku_penyebab' => 'Air liur kutu.',
                'penanganan_mandiri' => 'Anti-kutu & bersihkan rumah.',
                'saran_bawa_dokter' => 'Perlu obat alergi.',
            ],
            [
                'kode' => 'P006',
                'nama' => 'Diabetes Kucing',
                'presentasi' => 'Gangguan gula darah.',
                'deskripsi' => 'Minum & pipis berlebih.',
                'perilaku_penyebab' => 'Obesitas.',
                'penanganan_mandiri' => 'Diet rendah karbo.',
                'saran_bawa_dokter' => 'Perlu insulin.',
            ],
            [
                'kode' => 'P007',
                'nama' => 'Gagal Ginjal',
                'presentasi' => 'Kerusakan ginjal.',
                'deskripsi' => 'Sering pipis & haus.',
                'perilaku_penyebab' => 'Penuaan.',
                'penanganan_mandiri' => 'Diet renal.',
                'saran_bawa_dokter' => 'Cek darah & infus.',
            ],
            [
                'kode' => 'P008',
                'nama' => 'Konstipasi',
                'presentasi' => 'Sulit BAB.',
                'deskripsi' => 'Feses keras.',
                'perilaku_penyebab' => 'Kurang air.',
                'penanganan_mandiri' => 'Labu + air.',
                'saran_bawa_dokter' => 'Jika > 3 hari.',
            ],
            [
                'kode' => 'P009',
                'nama' => 'Diare',
                'presentasi' => 'BAB cair.',
                'deskripsi' => 'Pakan/stres.',
                'perilaku_penyebab' => 'Pakan berubah.',
                'penanganan_mandiri' => 'ORS & ayam rebus.',
                'saran_bawa_dokter' => 'Jika berdarah.',
            ],
            [
                'kode' => 'P010',
                'nama' => 'Cacingan',
                'presentasi' => 'Parasit usus.',
                'deskripsi' => 'Cacing terlihat.',
                'perilaku_penyebab' => 'Makanan kotor.',
                'penanganan_mandiri' => 'Bersihkan lingkungan.',
                'saran_bawa_dokter' => 'Obat cacing.',
            ],
            [
                'kode' => 'P011',
                'nama' => 'FIV',
                'presentasi' => 'Virus imun rendah.',
                'deskripsi' => 'Infeksi berulang.',
                'perilaku_penyebab' => 'Gigitan kucing.',
                'penanganan_mandiri' => 'Perawatan intensif.',
                'saran_bawa_dokter' => 'Cek rutin.',
            ],
            [
                'kode' => 'P012',
                'nama' => 'FeLV',
                'presentasi' => 'Virus leukemia.',
                'deskripsi' => 'Anemia & lesu.',
                'perilaku_penyebab' => 'Air liur.',
                'penanganan_mandiri' => 'Vitamin.',
                'saran_bawa_dokter' => 'Lab rutin.',
            ],
            [
                'kode' => 'P013',
                'nama' => 'Pyometra',
                'presentasi' => 'Infeksi rahim.',
                'deskripsi' => 'Nanah keluar.',
                'perilaku_penyebab' => 'Infeksi bakteri.',
                'penanganan_mandiri' => 'Tidak ada.',
                'saran_bawa_dokter' => 'Operasi segera.',
            ],
            [
                'kode' => 'P014',
                'nama' => 'Mastitis',
                'presentasi' => 'Infeksi puting.',
                'deskripsi' => 'Puting bengkak.',
                'perilaku_penyebab' => 'Bakteri.',
                'penanganan_mandiri' => 'Kompres hangat.',
                'saran_bawa_dokter' => 'Antibiotik.',
            ],
            [
                'kode' => 'P015',
                'nama' => 'Obstruksi Usus',
                'presentasi' => 'Sumbatan usus.',
                'deskripsi' => 'Perut keras.',
                'perilaku_penyebab' => 'Telan benda.',
                'penanganan_mandiri' => 'Tidak ada.',
                'saran_bawa_dokter' => 'Bedah.',
            ],
            [
                'kode' => 'P016',
                'nama' => 'FIP',
                'presentasi' => 'Coronavirus mutasi.',
                'deskripsi' => 'Perut berisi cairan.',
                'perilaku_penyebab' => 'Stres.',
                'penanganan_mandiri' => 'Nutrisi.',
                'saran_bawa_dokter' => 'Antiviral.',
            ],
            [
                'kode' => 'P017',
                'nama' => 'Prolapsus Rektum',
                'presentasi' => 'Usus keluar.',
                'deskripsi' => 'Benjolan merah.',
                'perilaku_penyebab' => 'Mengejan.',
                'penanganan_mandiri' => 'Kompres dingin.',
                'saran_bawa_dokter' => 'Segera ke dokter.',
            ]
        ];

        foreach ($data as $d) {
            Penyakit::updateOrCreate(
                ['kode' => $d['kode']],
                $d
            );
        }

        // ============================
        // MAPPING P001 – P017 → GEJALA
        // ============================
        $mapping = [
            'P001' => ['G001','G002','G003','G004','G005'],
            'P002' => ['G006','G007','G004','G008','G009'],
            'P003' => ['G010','G011','G012','G013'],
            'P004' => ['G014','G015','G016','G012'],
            'P005' => ['G010','G013','G012'],
            'P006' => ['G017','G018','G019','G009'],
            'P007' => ['G017','G018','G005','G020'],
            'P008' => ['G021','G022','G023'],
            'P009' => ['G024','G025','G009'],
            'P010' => ['G023','G026','G027'],
            'P011' => ['G009','G004','G029','G030'],
            'P012' => ['G028','G009','G005'],
            'P013' => ['G031','G004','G006','G032'],
            'P014' => ['G031','G009','G005'],
            'P015' => ['G006','G021','G032'],
            'P016' => ['G032','G004','G033'],
            'P017' => ['G034','G021','G035'],
        ];

        // ============================
        // SIMPAN KE TABLE PIVOT
        // ============================
        foreach ($mapping as $kode_penyakit => $gejala_list) {
            $penyakit = Penyakit::where('kode', $kode_penyakit)->first();
            if (!$penyakit) continue;

            foreach ($gejala_list as $kodeG) {
                $gejala = Gejala::where('kode', $kodeG)->first();
                if ($gejala) {
                    $penyakit->gejalas()->syncWithoutDetaching([$gejala->id]);
                }
            }
        }
    }
}
