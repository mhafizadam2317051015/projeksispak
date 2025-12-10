<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExpertSystem\ForwardChainingService;

class DiagnosisController extends Controller
{
    public function proses(Request $request, ForwardChainingService $service)
{
    $selectedGejala = $request->input('gejala', []);

    // pastikan format array dan bersih
    if (!is_array($selectedGejala)) {
        $selectedGejala = explode(',', (string)$selectedGejala);
    }
    $selectedGejala = array_filter(array_map('trim', $selectedGejala));

    // Ubah service untuk return semua hasil
    $semuaHasil = $service->diagnoseAll($selectedGejala); // Method baru

    if ($semuaHasil === null || empty($semuaHasil)) {
        return view('diagnosis.hasil', [
            'hasil' => [],
            'multipleResults' => false,
            'alternatifPenyakit' => []
        ]);
    }

    // Cari persentase tertinggi
    $persentaseTertinggi = $semuaHasil[0]['persentase'] ?? 0;
    
    // Ambil semua penyakit dengan persentase sama tertinggi
    $hasilTertinggi = array_filter($semuaHasil, function($item) use ($persentaseTertinggi) {
        return $item['persentase'] == $persentaseTertinggi;
    });
    
    // Hasil utama tetap ambil index 0
    $hasilUtama = $semuaHasil[0];
    
    // Data penyakit lengkap untuk hasil utama
    $penyakitData = $this->getPenyakitData();
    $infoPenyakit = $this->findPenyakitInfo($hasilUtama['penyakit'], $penyakitData);
    $hasilUtama['info'] = $infoPenyakit;
    
    // Tandai jika ada multiple results dengan persentase sama
    $multipleResults = count($hasilTertinggi) > 1;
    $alternatifPenyakit = [];
    
    if ($multipleResults) {
        // Ambil alternatif selain yang utama
        foreach ($hasilTertinggi as $item) {
            if ($item['kode'] !== $hasilUtama['kode']) {
                $alternatifPenyakit[] = [
                    'nama' => $item['penyakit'] ?? $item['nama'],
                    'persentase' => $item['persentase'],
                    'jumlah' => $item['jumlah'] ?? $item['matched']
                ];
            }
        }
    }

    return view('diagnosis.hasil', [
        'hasil' => [$hasilUtama],
        'multipleResults' => $multipleResults,
        'alternatifPenyakit' => $alternatifPenyakit,
        'debug_semua_hasil' => $semuaHasil // optional untuk debugging
    ]);
}

    /**
     * Data lengkap semua penyakit
     */
    private function getPenyakitData()
    {
        return [
            [
                'nama' => 'Panleukopenia (FPV / Distemper Kucing)',
                'gejala_utama' => ['Demam tinggi', 'Muntah berulang', 'Diare cair / berdarah', 'Dehidrasi berat', 'Lemas ekstrem', 'Nafsu makan hilang', 'Bulu kusam, mata cekung'],
                'perilaku_penyebab' => 'Virus menular dari kotoran, urine, muntahan, dan peralatan kandang. Sering terjadi pada anak kucing belum vaksin. Menyebar sangat cepat di lingkungan padat kucing.',
                'penanganan_mandiri' => 'Berikan cairan elektrolit / ORS khusus hewan sedikit demi sedikit setiap 10–15 menit menggunakan spuit. Berikan makanan lembut encer (wetfood dicampur air hangat) dalam porsi kecil tapi sering. Jaga tubuh tetap hangat dengan selimut / botol air hangat. Isolasi dari kucing lain, bersihkan kandang setiap hari. Gunakan disinfektan pemutih 1:30 untuk membunuh virus di lantai/peralatan.',
                'ke_dokter' => 'Tidak bisa minum sendiri. Muntah tidak berhenti. Diare darah banyak. Kondisi tidak membaik dalam 24 jam.'
            ],
            [
                'nama' => 'ISPA / URTI (Flu kucing, Calici, Herpesvirus)',
                'gejala_utama' => ['Bersin', 'Pilek', 'Batuk', 'Mata berair / bernanah', 'Sesak / napas berbunyi', 'Lesu dan tidak mau makan'],
                'perilaku_penyebab' => 'Virus menular lewat udara, kontak dekat, wadah makan bersama. Lingkungan lembab, stres, imun lemah. Sering terjadi pada kucing baru adopsi / shelter.',
                'penanganan_mandiri' => 'Inhalasi uap air panas 10–15 menit untuk membuka saluran napas. Bersihkan mata & hidung dengan saline 3–4x sehari. Hangatkan makanan basah agar aromanya kuat sehingga mau makan. Vitamin imun (L-Lysine, madu hewan, omega 3). Suhu ruangan hangat & kering, hindari kipas langsung.',
                'ke_dokter' => 'Nafas lewat mulut. Tidak makan > 24 jam. Mata membengkak besar.'
            ],
            [
                'nama' => 'Gastroenteritis / Masalah Pencernaan',
                'gejala_utama' => ['Muntah', 'Diare', 'Perut kembung', 'Lemas'],
                'perilaku_penyebab' => 'Makan makanan basi / pergantian makanan mendadak. Alergi makanan. Infeksi bakteri atau virus. Menelan benda asing kecil.',
                'penanganan_mandiri' => 'Puasa makan 12 jam, tapi tetap beri air / ORS. Setelah puasa, beri makanan ringan seperti: Pure labu kuning rebus, Wetfood rendah lemak, Nasi + ayam rebus halus sedikit. Berikan probiotik pet 1x sehari. Bersihkan litterbox dan cek konsistensi feses.',
                'ke_dokter' => 'Muntah darah / hitam. Diare lebih dari 3 hari. Dehidrasi (kulit tidak kembali saat dicubit).'
            ],
            [
                'nama' => 'Cacingan',
                'gejala_utama' => ['Diare berulang', 'Muntah keluar cacing', 'Perut buncit tapi kurus', 'Bulu kusam', 'Gusi pucat'],
                'perilaku_penyebab' => 'Litter box kotor. Minum/makan yang terkontaminasi telur cacing. Kutu & pinjal (cacing pita).',
                'penanganan_mandiri' => 'Berikan obat cacing khusus kucing sesuai dosis berat badan (1x setiap 3 bulan). Bersihkan litter box setiap hari + disinfeksi. Cuci tempat makan & minum dengan air panas. Mandikan kucing dan bersihkan area rumah.',
                'ke_dokter' => 'Diare darah. Tidak mau makan & lemas ekstrem.'
            ],
            [
                'nama' => 'FLUTD / Batu Ginjal / Susah Pipis',
                'gejala_utama' => ['Pipis sedikit-sedikit', 'Mengejan kuat dan mengeong kesakitan', 'Pipis berdarah', 'Sering ke litter box tapi tidak keluar'],
                'perilaku_penyebab' => 'Kurang minum. Banyak makan dry food tinggi magnesium. Obesitas. Stress lingkungan.',
                'penanganan_mandiri' => 'Tambah asupan air: fountain, wetfood dicampur air hangat. Kompres hangat pada perut bawah 5–10 menit. Kurangi dry food, ganti dengan urinary-wet food. Sediakan banyak litter box dan area tenang.',
                'ke_dokter' => 'Tidak bisa pipis sama sekali (darurat 24 jam bisa fatal).'
            ],
            [
                'nama' => 'Jamur Kulit / Ringworm',
                'gejala_utama' => ['Kerontokan bulu membentuk pola lingkaran', 'Kulit merah, bersisik, gatal'],
                'perilaku_penyebab' => 'Lingkungan lembab dan kotor. Kontak dengan hewan terinfeksi. Menular ke manusia (zoonosis).',
                'penanganan_mandiri' => 'Oleskan krim antijamur pet-safe (ketoconazole / miconazole). Mandi antijamur 2x seminggu. Isolasi kucing di ruangan khusus. Cuci alas tidur & kurangi kelembapan ruangan.',
                'ke_dokter' => 'Menyebar cepat atau bernanah.'
            ],
            [
                'nama' => 'FCV (Feline Calicivirus)',
                'gejala_utama' => ['Luka mulut / sariawan', 'Air liur berlebihan', 'Demam'],
                'perilaku_penyebab' => 'Menular melalui air liur dan mangkuk makan. Sering terjadi di shelter atau banyak kucing.',
                'penanganan_mandiri' => 'Gunakan wetfood lembut (blender jika perlu). Hindari makanan keras. Bersihkan mulut pakai saline 2x sehari. Vitamin imun & madu hewan.',
                'ke_dokter' => 'Tidak mampu makan sama sekali. Luka membesar.'
            ],
            [
                'nama' => 'Rabies',
                'gejala_utama' => ['Perubahan perilaku drastis (galak / takut air)', 'Sering menggigit', 'Lumpuh & kejang'],
                'perilaku_penyebab' => 'Gigitan hewan terinfeksi.',
                'penanganan_mandiri' => '🚫 Tidak ada penanganan rumahan',
                'ke_dokter' => 'Segera ke dokter / dinas kesehatan. Darurat & harus dilaporkan.'
            ],
            [
                'nama' => 'FIV',
                'gejala_utama' => ['Infeksi berulang', 'Sariawan mulut', 'Turun berat badan', 'Imun rendah'],
                'perilaku_penyebab' => 'Gigitan antar kucing saat berkelahi.',
                'penanganan_mandiri' => 'Pakan bergizi tinggi. Vitamin imun & probiotik. Minimalkan stres dan isolasi dari kucing lain. Lingkungan bersih & hangat.',
                'ke_dokter' => 'Tidak makan > 24 jam.'
            ],
            [
                'nama' => 'FeLV',
                'gejala_utama' => ['Anemia, pucat', 'Penurunan berat badan', 'Infeksi berulang'],
                'perilaku_penyebab' => 'Air liur, makan bersama, grooming sesama.',
                'penanganan_mandiri' => 'Protein tinggi. Imun booster & probiotik. Hindari kontak dengan kucing sehat.',
                'ke_dokter' => 'Perdarahan atau lemas berat.'
            ],
            [
                'nama' => 'Scabies / Kudis',
                'gejala_utama' => ['Gatal ekstrem', 'Kerak tebal di telinga & wajah', 'Rambut rontok'],
                'perilaku_penyebab' => 'Tungau kulit. Lingkungan kotor.',
                'penanganan_mandiri' => 'Mandi obat sulfur 2x seminggu. Oles minyak kelapa atau salep soothing untuk gatal. Isolasi & desinfeksi ruangan.',
                'ke_dokter' => 'Luka bernanah.'
            ],
            [
                'nama' => 'Otitis / Tungau Telinga',
                'gejala_utama' => ['Kotoran telinga hitam seperti bubuk kopi', 'Bau busuk', 'Menggeleng kepala terus'],
                'perilaku_penyebab' => 'Tungau, alergi, infeksi bakteri.',
                'penanganan_mandiri' => 'Bersihkan telinga dengan ear cleanser pet-safe 1x/hari. Oles/tetes obat antiparasit telinga.',
                'ke_dokter' => 'Kepala miring atau telinga bengkak besar.'
            ],
            [
                'nama' => 'Pyometra',
                'gejala_utama' => ['Nanah keluar dari vagina', 'Demam, muntah', 'Perut membesar'],
                'perilaku_penyebab' => 'Infeksi rahim pada kucing betina tidak steril.',
                'penanganan_mandiri' => '🚫 Tidak ada penanganan rumahan',
                'ke_dokter' => 'Butuh operasi segera.'
            ],
            [
                'nama' => 'Mastitis',
                'gejala_utama' => ['Puting bengkak, merah & panas', 'Susu bercampur nanah', 'Menolak menyusui'],
                'perilaku_penyebab' => 'Infeksi bakteri karena luka gigitan anak.',
                'penanganan_mandiri' => 'Kompres hangat 10–15 menit. Susui anak kucing menggunakan susu formula. Jaga kebersihan alas tidur.',
                'ke_dokter' => 'Demam tinggi & nanah keluar banyak.'
            ],
            [
                'nama' => 'Obstruksi Usus',
                'gejala_utama' => ['Muntah terus menerus', 'Tidak buang air besar', 'Perut keras & kesakitan'],
                'perilaku_penyebab' => 'Menelan benda asing (plastik, tali, karet, tulang).',
                'penanganan_mandiri' => '🚫 Tidak ada penanganan aman',
                'ke_dokter' => 'Operasi / endoskopi darurat.'
            ],
            [
                'nama' => 'FIP',
                'gejala_utama' => ['Perut membesar (wet FIP)', 'Demam berulang', 'Nafas berat', 'Mata menguning'],
                'perilaku_penyebab' => 'Mutasi virus coronavirus kucing akibat stres & imun rendah.',
                'penanganan_mandiri' => 'Nutrisi tinggi protein. Tambahkan cairan elektrolit. Ruangan hangat & nyaman.',
                'ke_dokter' => 'Evaluasi terapi antiviral GS.'
            ],
            [
                'nama' => 'Prolapsus Rektum (Usus Keluar)',
                'gejala_utama' => ['Benjolan merah daging keluar dari anus', 'Kesulitan BAB / mengejan terus', 'Menjilati/menggigit area anus', 'Darah/lendir keluar dari anus'],
                'perilaku_penyebab' => 'Mengejan terus akibat diare parah. Konstipasi/feses keras. Parasit usus (cacingan berat). Infeksi usus. Benda asing di usus.',
                'penanganan_mandiri' => 'Bersihkan area anus dengan air hangat steril/saline. Kompres air dingin/es 5–10 menit untuk mengurangi bengkak. Oleskan pelumas steril. Berikan ORS. Berikan makanan wetfood lembek tinggi serat.',
                'ke_dokter' => 'Jaringan berubah warna gelap/hitam (nekrosis). Prolaps tidak kembali masuk setelah 30–60 menit. Tidak bisa BAB sama sekali. Perdarahan banyak. Prolaps sudah keluar > 2 jam.'
            ]
        ];
    }

    /**
     * Cari informasi penyakit berdasarkan nama
     */
    private function findPenyakitInfo($namaPenyakit, $penyakitData)
    {
        // Coba cari exact match
        foreach ($penyakitData as $penyakit) {
            if (strtolower(trim($penyakit['nama'])) === strtolower(trim($namaPenyakit))) {
                return $penyakit;
            }
        }
        
        // Coba cari partial match (untuk handle kemungkinan nama berbeda)
        foreach ($penyakitData as $penyakit) {
            if (strpos(strtolower($namaPenyakit), strtolower($penyakit['nama'])) !== false ||
                strpos(strtolower($penyakit['nama']), strtolower($namaPenyakit)) !== false) {
                return $penyakit;
            }
        }
        
        // Jika tidak ditemukan, coba cari dengan mapping nama
        $namaMapping = [
            'Panleukopenia' => 'Panleukopenia (FPV / Distemper Kucing)',
            'ISPA' => 'ISPA / URTI (Flu kucing, Calici, Herpesvirus)',
            'URTI' => 'ISPA / URTI (Flu kucing, Calici, Herpesvirus)',
            'Gastroenteritis' => 'Gastroenteritis / Masalah Pencernaan',
            'FLUTD' => 'FLUTD / Batu Ginjal / Susah Pipis',
            'Batu Ginjal' => 'FLUTD / Batu Ginjal / Susah Pipis',
            'Ringworm' => 'Jamur Kulit / Ringworm',
            'FCV' => 'FCV (Feline Calicivirus)',
            'Calicivirus' => 'FCV (Feline Calicivirus)',
            'Scabies' => 'Scabies / Kudis',
            'Kudis' => 'Scabies / Kudis',
            'Otitis' => 'Otitis / Tungau Telinga',
            'Tungau Telinga' => 'Otitis / Tungau Telinga',
            'Pyometra' => 'Pyometra',
            'Prolapsus' => 'Prolapsus Rektum (Usus Keluar)',
            'Obstruksi Usus' => 'Obstruksi Usus',
            'FIP' => 'FIP',
        ];
        
        foreach ($namaMapping as $key => $value) {
            if (strpos(strtolower($namaPenyakit), strtolower($key)) !== false) {
                foreach ($penyakitData as $penyakit) {
                    if ($penyakit['nama'] === $value) {
                        return $penyakit;
                    }
                }
            }
        }
        
        // Default jika tidak ditemukan
        return [
            'nama' => $namaPenyakit,
            'gejala_utama' => ['Informasi gejala sedang diperbarui'],
            'perilaku_penyebab' => 'Konsultasikan dengan dokter hewan untuk informasi lebih detail.',
            'penanganan_mandiri' => 'Konsultasikan dengan dokter hewan untuk penanganan yang tepat.',
            'ke_dokter' => 'Segera konsultasi ke dokter hewan.'
        ];
    }
}