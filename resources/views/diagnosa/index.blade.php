@extends('layouts.app')

@section('title', 'Diagnosa Penyakit Kucing')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Diagnosa Penyakit Kucing</h5>
            </div>

            <div class="card-body">
                
                <p class="mb-3">Pilih gejala yang dialami kucing Anda:</p>

                <form action="{{ route('diagnosa.hasil') }}" method="POST">
                    @csrf

                    <div class="row">
                        @foreach ($gejalas as $g)
                            <div class="col-md-4 col-sm-6 mb-2">
                                <div class="border rounded p-2">
                                    <label class="d-flex align-items-center">
                                        <input type="checkbox" name="gejala[]" value="{{ $g->kode }}" 
                                               class="form-check-input me-2">
                                        <span>
                                            <strong>{{ $g->kode }}</strong> — {{ $g->nama }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="btn btn-primary w-100 mt-3">Proses Diagnosa</button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
