@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Hasil Diagnosa</h5>
            </div>

            <div class="card-body">

                <h6>Gejala yang dipilih:</h6>
                <ul>
                    @foreach($dataGejala as $g)
                        <li>{{ $g->kode }} — {{ $g->nama }}</li>
                    @endforeach
                </ul>

                <hr>

                @if($hasilPenyakit)
                <h5><strong>Penyakit Terdeteksi :</strong> {{ $hasilPenyakit->nama }}</h5>
                <p>Persentase Kecocokan : <strong>{{ $presentase }}%</strong></p>

                <h6>Deskripsi:</h6>
                <p>{{ $hasilPenyakit->deskripsi }}</p>

                <h6>Perilaku/Penyebab:</h6>
                <p>{{ $hasilPenyakit->perilaku }}</p>

                <h6>Penanganan Mandiri:</h6>
                <p>{{ $hasilPenyakit->penanganan }}</p>

                <h6>Saran Pergi ke Dokter:</h6>
                <p>{{ $hasilPenyakit->saran }}</p>
                @else
                <h5 class="text-danger">Tidak ada penyakit yang cocok.</h5>
                @endif

            </div>
        </div>

    </div>
</div>

@endsection
