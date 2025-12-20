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

    <!-- Warning jika persentase rendah -->
    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-start">
                <i class="fas fa-exclamation-triangle me-2 mt-1 fs-4"></i>
                <div>
                    <h5 class="alert-heading mb-1">⚠️ Diagnosis Belum Akurat</h5>
                    <p class="mb-1">{!! session('warning') !!}</p>
                    @if(session('persentase'))
                        <div class="d-flex align-items-center mt-2">
                            <div class="progress flex-grow-1 me-2" style="height: 10px;">
                                <div class="progress-bar bg-warning" 
                                     style="width: {{ session('persentase') }}%">
                                </div>
                            </div>
                            <small class="fw-bold">{{ session('persentase') }}%</small>
                        </div>
                        <p class="small mt-2 mb-0">
                            <i class="fas fa-lightbulb text-warning me-1"></i>
                            <strong>Tambahkan gejala lain untuk meningkatkan akurasi di atas 70%</strong>
                        </p>
                    @endif
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

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
                
                <!-- Info jika ada gejala sebelumnya -->
                @if(!empty($selectedFromSession) && count($selectedFromSession) > 0)
                    <div class="alert alert-info py-2 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-history me-2"></i>
                            <div>
                                <small class="fw-bold">Gejala sebelumnya telah dipilih:</small>
                                <div class="mt-1">
                                    @foreach($gejala->whereIn('kode', $selectedFromSession) as $g)
                                        <span class="badge bg-info text-dark me-1 mb-1">
                                            {{ $g->kode }}: {{ $g->nama }}
                                        </span>
                                    @endforeach
                                </div>
                                <small class="d-block mt-1">Anda bisa menambah atau mengurangi gejala</small>
                            </div>
                        </div>
                    </div>
                @endif

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
                                            @php
                                                $isChecked = in_array($g->kode, $selectedFromSession ?? []);
                                            @endphp
                                            <div class="form-check symptom-item mb-1">
                                                <input class="form-check-input symptom-checkbox" 
                                                       type="checkbox" 
                                                       name="gejala[]" 
                                                       id="{{ $g->kode }}" 
                                                       value="{{ $g->kode }}"
                                                       {{ $isChecked ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $g->kode }}">
                                                    <small>
                                                        <span class="badge bg-secondary me-1">{{ $g->kode }}</span>
                                                        {{ $g->nama }}
                                                        @if($isChecked)
                                                            <span class="badge bg-success ms-1">✓</span>
                                                        @endif
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
                            <a href="{{ route('diagnosa.reset') }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="fas fa-redo"></i> Mulai Baru
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="selectAll()">
                                <i class="fas fa-check-double"></i> Pilih Semua
                            </button>
                        </div>
                        <div>
                            @if(session('persentase') && session('persentase') < 70)
                                <button type="submit" class="btn btn-warning btn-sm px-3" id="submitBtn">
                                    <i class="fas fa-search-plus me-1"></i> Analisis dengan Gejala Tambahan
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary btn-sm px-3" id="submitBtn">
                                    <i class="fas fa-search me-1"></i> Analisis
                                </button>
                            @endif
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
            <strong>Tips:</strong> 
            @if(session('persentase') && session('persentase') < 70)
                <strong class="text-warning">Diagnosis membutuhkan minimal 70% akurasi.</strong> 
                Pilih gejala tambahan yang sesuai untuk hasil lebih akurat.
            @else
                Pilih semua gejala yang sesuai untuk hasil lebih akurat. Minimal pilih 1 gejala.
            @endif
        </small>
    </div>
</div>

<script>
    // Update selected symptoms counter
    const checkboxes = document.querySelectorAll('.symptom-checkbox');
    const counter = document.getElementById('selectedCount');
    const submitBtn = document.getElementById('submitBtn');
    
    // Function to update counter
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
    
    // Auto-check previously selected symptoms
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize counter with pre-checked items
        updateCounter();
        
        // Mark pre-checked items
        checkboxes.forEach(checkbox => {
            if(checkbox.checked) {
                checkbox.closest('.symptom-item').classList.add('checked');
            }
        });
    });
    
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
    
    // Event listeners for checkboxes
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCounter);
    });
</script>

<style>
    .symptoms-list {
        min-height: auto;
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
        border-left: 3px solid #10b981;
    }
    
    .symptom-item.checked .badge.bg-secondary {
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
    
    .form-check-input:checked {
        background-color: #10b981;
        border-color: #10b981;
    }
    
    #submitBtn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    /* Progress bar in warning */
    .progress {
        background-color: #ffeaa7;
    }
    
    .progress-bar {
        border-radius: 4px;
    }
</style>
@endsection