@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <h3 class="fw-bold text-primary mb-3">Tentang Sistem Pakar — Sistem Pakar Kucing</h3>

            <p>
                <strong>Sistem Pakar Kucing</strong> adalah aplikasi sistem pakar yang dirancang untuk membantu 
                mendiagnosa berbagai penyakit kucing berdasarkan gejala yang dialami. 
                Sistem ini menggunakan dua metode utama dalam proses penalarannya, yaitu 
                <strong>Certainty Factor (CF)</strong> untuk menghitung tingkat keyakinan 
                dan <strong>Forward Chaining</strong> untuk menelusuri aturan gejala–penyakit.
            </p>

            <hr>

            <h5 class="fw-bold text-primary">Fitur Utama</h5>
            <ul>
                <li>Diagnosa penyakit kucing berbasis gejala</li>
                <li>Penelusuran aturan menggunakan metode <strong>Forward Chaining</strong></li>
                <li>Perhitungan tingkat kepastian menggunakan <strong>Certainty Factor (CF)</strong></li>
                <li>Rekomendasi penanganan mandiri</li>
                <li>Saran kapan harus ke dokter hewan</li>
                <li>Database penyakit, gejala, perilaku/penyebab, dan solusi penanganan lengkap</li>
            </ul>

            <hr>

            <h5 class="fw-bold text-primary">Cara Kerja Sistem</h5>
            <p>Pengguna memilih beberapa gejala yang dirasakan pada kucing. Sistem kemudian akan melakukan proses berikut:</p>

            <ol>
                <li>Mengambil data gejala–penyakit dari database</li>
                <li>Mencocokkan gejala dengan aturan menggunakan metode <strong>Forward Chaining</strong></li>
                <li>Menghitung nilai CF untuk setiap penyakit kandidat</li>
                <li>Menampilkan hasil diagnosa dengan tingkat keyakinan tertinggi</li>
                <li>Memberikan penanganan mandiri serta saran kapan harus ke dokter hewan</li>
            </ol>

            <hr>

            <h5 class="fw-bold text-primary">Tujuan Dibuatnya Sistem Ini</h5>
            <p>
                Sistem ini dibuat untuk membantu pemilik kucing mengenali potensi penyakit sejak dini, 
                sehingga dapat melakukan tindakan awal sebelum kondisi semakin parah. 
                Namun, sistem ini <strong>bukan pengganti dokter hewan</strong>. 
                Keputusan medis tetap harus dikonsultasikan kepada tenaga profesional.
            </p>

        </div>
    </div>
</div>
@endsection
