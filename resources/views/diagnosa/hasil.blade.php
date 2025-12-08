@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Hasil Diagnosa Kucing</h5>
    </div>

    <div class="card-body">

        {{-- Jika tidak ada kecocokan --}}
        @if(!$hasil || $hasil['score'] == 0)
            <div class="alert alert-warning">
                Tidak ditemukan penyakit yang cocok dengan gejala yang dipilih.
            </div>

            <a href="{{ url('/diagnosa') }}" class="btn btn-secondary w-100 mt-3">
                Kembali ke Form Diagnosa
            </a>
            @return
        @endif

        {{-- Ringkasan --}}
        <div class="alert alert-info">
            <strong>Gejala yang dipilih:</strong>
        </div>

        <ul>
            @foreach ($gejalaDipilih as $g)
                <li><strong>{{ $g->kode }}</strong> — {{ $g->nama }}</li>
            @endforeach
        </ul>

        <hr>

        {{-- HASIL PENYAKIT --}}
        <h5 class="mt-3"><strong>Hasil Analisa:</strong></h5>

        <div class="card-result p-3 border rounded bg-light">
            <p class="mb-1">
                <strong>Penyakit Teridentifikasi:</strong>  
                <span class="text-primary">{{ $hasil['penyakit']->nama }}</span>
            </p>

            <p class="mb-1">
                <strong>Kode Penyakit:</strong> {{ $hasil['penyakit']->kode }}
            </p>

            <p class="mb-1">
                <strong>Kecocokan Gejala:</strong> {{ $hasil['cocok'] }} / {{ $hasil['total'] }}
            </p>

            <p class="mb-2">
                <strong>Persentase Kecocokan:</strong>  
                <span class="text-success">{{ $hasil['score'] }}%</span>
            </p>
        </div>

        <hr>

        {{-- DESKRIPSI --}}
        <h5 class="mt-3"><strong>Detail Penyakit</strong></h5>

        <p><strong>Deskripsi:</strong></p>
        <p>{{ $hasil['penyakit']->deskripsi ?? '-' }}</p>

        <p class="mt-3"><strong>Perilaku / Penyebab:</strong></p>
        <p>{{ $hasil['penyakit']->perilaku_penyebab ?? '-' }}</p>

        <p class="mt-3"><strong>Penanganan Mandiri:</strong></p>
        <p>{{ $hasil['penyakit']->penanganan_mandiri ?? '-' }}</p>

        <p class="mt-3"><strong>Saran Membawa ke Dokter:</strong></p>
        <p>{{ $hasil['penyakit']->saran_bawa_dokter ?? '-' }}</p>

        <a href="{{ url('/diagnosa') }}" class="btn btn-primary w-100 mt-4">
            Diagnosa Lagi
        </a>

    </div>
</div>

@endsection
