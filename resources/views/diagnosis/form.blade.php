@extends('layouts.app')

@section('title', 'Diagnosis Penyakit Kucing')
@section('content')
<div class="container mt-3">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: var(--primary-color);">
            <i class="fas fa-cat me-2"></i>Diagnosis Penyakit Kucing
        </h2>
        <p class="text-muted mb-2">
            Pilih gejala sesuai kategori untuk analisis sistem pakar.
        </p>
        <div class="badge bg-info">
            <i class="fas fa-info-circle me-1"></i>Centang gejala yang muncul
        </div>
    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-primary text-white py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">
                    <i class="fas fa-clipboard-list me-1"></i>Form Gejala
                </h6>
                <div>
                    <span class="badge bg-light text-primary">
                        <span id="selectedCount">0</span> gejala
                    </span>
                </div>
            </div>
        </div>
        
        <div class="card-body p-3">
            <form method="POST" action="{{ route('diagnosa.proses') }}" id="diagnosisForm">
                @csrf
                
                <!-- Category Navigation -->
                <div class="mb-3">
                    <div class="d-flex flex-wrap gap-1 mb-2">
                        @php
                            $kategoriList = [
                                'A' => 'Sistemik',
                                'B' => 'Pencernaan',
                                'C' => 'Pernapasan',
                                'D' => 'Mata & Mulut',
                                'E' => 'Kulit',
                                'F' => 'Perkemihan',
                                'G' => 'Reproduksi',
                                'H' => 'Saraf',
                                'I' => 'Anus',
                            ];
                        @endphp
                        
                        @foreach($kategoriList as $key => $label)
                            <a href="#cat-{{ $key }}" class="btn btn-sm btn-outline-primary py-1 px-2">
                                {{ $key }}. {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Gejala per Kategori -->
                <div class="row">
                    @foreach($kategoriList as $key => $label)
                        @php
                            $gejalaKategori = $gejala->where('kategori', $key);
                        @endphp
                        
                        @if($gejalaKategori->count() > 0)
                            <div class="col-md-6 mb-3">
                                <div class="border rounded p-2 h-100" id="cat-{{ $key }}">
                                    <h6 class="fw-bold text-primary border-bottom pb-1 mb-2">
                                        <i class="fas fa-folder me-1"></i>{{ $key }}. {{ $label }}
                                        <small class="text-muted float-end">{{ $gejalaKategori->count() }}</small>
                                    </h6>
                                    
                                    <div class="symptoms-list">
                                        @foreach($gejalaKategori as $g)
                                            <div class="form-check symptom-item mb-1">
                                                <input class="form-check-input symptom-checkbox" 
                                                       type="checkbox" 
                                                       name="gejala[]" 
                                                       id="{{ $g->kode }}" 
                                                       value="{{ $g->kode }}">
                                                <label class="form-check-label" for="{{ $g->kode }}">
                                                    <small>
                                                        <span class="badge bg-secondary me-1">{{ $g->kode }}</span>
                                                        {{ $g->nama }}
                                                    </small>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="border-top pt-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary me-1" onclick="resetForm()">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="selectAll()">
                                <i class="fas fa-check-double"></i> Pilih Semua
                            </button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm px-3" id="submitBtn">
                                <i class="fas fa-search me-1"></i> Analisis
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Tips -->
    <div class="alert alert-light border p-2 mb-3">
        <small>
            <i class="fas fa-lightbulb text-warning me-1"></i>
            <strong>Tips:</strong> Pilih semua gejala yang sesuai untuk hasil lebih akurat. Minimal pilih 1 gejala.
        </small>
    </div>
</div>

<script>
    // Update selected symptoms counter
    const checkboxes = document.querySelectorAll('.symptom-checkbox');
    const counter = document.getElementById('selectedCount');
    const submitBtn = document.getElementById('submitBtn');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCounter);
    });
    
    function updateCounter() {
        const checked = document.querySelectorAll('.symptom-checkbox:checked').length;
        counter.textContent = checked;
        
        // Update UI for checked items
        document.querySelectorAll('.symptom-item').forEach(item => {
            const checkbox = item.querySelector('.symptom-checkbox');
            if(checkbox.checked) {
                item.classList.add('checked');
            } else {
                item.classList.remove('checked');
            }
        });
        
        // Enable/disable submit button
        submitBtn.disabled = (checked === 0);
    }
    
    function resetForm() {
        if(confirm('Reset semua pilihan gejala?')) {
            checkboxes.forEach(cb => cb.checked = false);
            updateCounter();
        }
    }
    
    function selectAll() {
        checkboxes.forEach(cb => cb.checked = true);
        updateCounter();
    }
    
    // Form submission validation
    document.getElementById('diagnosisForm').addEventListener('submit', function(e) {
        if (document.querySelectorAll('.symptom-checkbox:checked').length === 0) {
            e.preventDefault();
            alert('Silakan pilih minimal satu gejala.');
            return false;
        }
    });
    
    // Initialize
    updateCounter();
</script>

<style>
    .symptoms-list {
    min-height: auto; /* Biarkan natural height */
    padding-right: 5px;
}
    
    .symptom-item {
        padding: 3px 5px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }
    
    .symptom-item:hover {
        background-color: #f8f9fa;
    }
    
    .symptom-item.checked {
        background-color: #e7f7ef;
    }
    
    .symptom-item.checked .badge {
        background-color: #10b981 !important;
    }
    
    .form-check-input {
        transform: scale(0.9);
        margin-top: 0.2rem;
    }
    
    .form-check-label {
        font-size: 0.85rem;
        cursor: pointer;
    }
    
    .symptoms-list::-webkit-scrollbar {
        width: 4px;
    }
    
    .symptoms-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 2px;
    }
    
    .symptoms-list::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 2px;
    }
    
    #submitBtn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endsection