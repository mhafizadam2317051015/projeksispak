@extends('layouts.app')

@section('title','Diagnosa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Diagnosa Kucing</h5>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ url('/diagnosa/proses') }}">
            @csrf

            <p class="mb-2">Pilih gejala yang dialami kucing:</p>

            <div class="row">
                @foreach($gejalas as $g)
                <div class="col-md-6 mb-2">
                    <div class="form-check p-2 border rounded bg-light">

                        <input 
                            type="checkbox" 
                            class="form-check-input" 
                            name="gejala[]" 
                            value="{{ $g->kode }}" 
                            id="gejala_{{ $g->kode }}"
                        >

                        <label class="form-check-label ms-1" for="gejala_{{ $g->kode }}">
                            <strong>{{ $g->kode }}</strong> — {{ $g->nama }}
                        </label>

                    </div>
                </div>
                @endforeach
            </div>

            <button class="btn btn-primary w-100 mt-3">
                Proses Diagnosa
            </button>

        </form>

    </div>
</div>
@endsection
