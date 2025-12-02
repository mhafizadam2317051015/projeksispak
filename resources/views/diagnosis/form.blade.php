@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Form Diagnosis Penyakit Kucing</h2>
    <p>Silakan pilih gejala yang dialami kucing:</p>

    <form action="{{ route('diagnosa.proses') }}" method="POST">
        @csrf

        <div class="row">
            @foreach($gejala as $g)
                <div class="col-md-4 mb-2">
                    <label class="d-flex align-items-center">
                        <input type="checkbox" name="gejala[]" value="{{ $g->kode }}" class="me-2">
                        {{ $g->kode }} - {{ $g->nama }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Diagnosa Sekarang</button>
    </form>

</div>
@endsection
