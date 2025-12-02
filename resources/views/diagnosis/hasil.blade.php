@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Hasil Diagnosis</h2>

    @if(empty($result) || count($result) === 0)
        <div class="alert alert-warning">
            Tidak ditemukan penyakit berdasarkan gejala yang dipilih.
        </div>
    @else
        <div class="alert alert-success">
            <h4>Penyakit yang terdeteksi:</h4>
            <ul>
                @foreach($result as $p)
                    <li><strong>{{ $p }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('diagnosa.form') }}" class="btn btn-secondary">Kembali</a>

</div>
@endsection
