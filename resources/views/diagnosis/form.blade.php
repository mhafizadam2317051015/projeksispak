<?php
$kategoriList = [
    'A' => 'Sistemik / Umum',
    'B' => 'Pencernaan',
    'C' => 'Pernapasan',
    'D' => 'Mata, Hidung, Mulut',
    'E' => 'Kulit & Bulu',
    'F' => 'Perkemihan',
    'G' => 'Reproduksi',
    'H' => 'Saraf & Perilaku',
    'I' => 'Anus & Rektum',
];
?>

@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="fw-bold mb-3">Form Diagnosis Penyakit Kucing</h2>
    <p>Pilih gejala sesuai kategori:</p>

    <form method="POST" action="{{ route('diagnosa.proses') }}">
        @csrf

        <div class="row">

            @foreach($kategoriList as $key => $label)

            <div class="col-md-6 mb-4">
                <h5 class="fw-bold text-primary">{{ $key }}. {{ $label }}</h5>

                @foreach($gejala->where('kategori', $key) as $g)
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" 
                               name="gejala[]" id="{{ $g->kode }}" value="{{ $g->kode }}">
                        <label class="form-check-label" for="{{ $g->kode }}">
                            {{ $g->kode }} — {{ $g->nama }}
                        </label>
                    </div>
                @endforeach

            </div>

            @endforeach

        </div>

        <button class="btn btn-primary px-4 mt-3">Diagnosa Sekarang</button>
    </form>

</div>
@endsection
