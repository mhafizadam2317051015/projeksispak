@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Hasil Diagnosis</h2>

    @if(empty($hasil) || count($hasil) === 0)
        <div class="alert alert-warning">
            Tidak ditemukan penyakit berdasarkan gejala yang dipilih.
        </div>
    @else

        @php
            // ambil hasil terbaik (first)
            $p = $hasil[0];
            $kode = $p['kode'] ?? '-';
            $nama = $p['penyakit'] ?? $p['nama'] ?? '-';
            $persen = $p['persentase'] ?? $p['persentase'] ?? $p['persentase'] ?? ($p['persentase'] ?? ($p['persentase'] ?? ($p['persentase'] ?? '0')));
            // fallback: jika python mengembalikan 'persentase' atau 'persentase'
            $persen = $p['persentase'] ?? $p['persentase'] ?? $p['persentase'] ?? ($p['persentase'] ?? (isset($p['persentase']) ? $p['persentase'] : (isset($p['persentase']) ? $p['persentase'] : 0)));
            $jumlah = $p['jumlah'] ?? $p['matched'] ?? 0;
        @endphp

        <div class="alert alert-success">
            <h4>Penyakit yang terdeteksi:</h4>
            <ul>
                <li>
                    <strong>{{ $nama }}</strong><br>
                    <small>
                        Kode: {{ $kode }}<br>
                        Persentase kecocokan: {{ $persen }}%<br>
                        Jumlah gejala cocok: {{ $jumlah }}
                    </small>
                </li>
            </ul>
        </div>

    @endif

    <a href="{{ route('diagnosa.form') }}" class="btn btn-secondary">Kembali</a>

</div>
@endsection
