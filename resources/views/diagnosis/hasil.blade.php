@extends('layouts.app')

@section('title', 'Hasil Diagnosis')
@section('content')
<div class="container mt-3">
    <!-- Back Button -->
    <a href="{{ route('diagnosis.form') }}" class="btn btn-sm btn-outline-primary mb-3">
        <i class="fas fa-arrow-left me-1"></i>Kembali
    </a>

    @if(isset($showDiagnosis) && !$showDiagnosis)
        
        <!-- Warning Box -->
        <div class="card border-warning mb-4">
            <div class="card-header bg-warning text-dark py-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-2 fs-4"></i>
                    <div>
                        <h4 class="mb-0 fw-bold">⚠️ Diagnosis Belum Akurat</h4>
                        <p class="mb-0 opacity-75">Perlu lebih banyak gejala untuk diagnosis yang tepat</p>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-4">
                <!-- Progress Section -->
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <div class="progress mx-auto" style="height: 20px; max-width: 400px;">
                            <div class="progress-bar bg-warning progress-bar-striped" 
                                 role="progressbar" 
                                 style="width: {{ $persentase }}%">
                                <span class="fw-bold">{{ $persentase }}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h2 class="fw-bold text-warning">{{ $persentase }}%</h2>
                        <p class="text-muted mb-0">Tingkat kecocokan saat ini</p>
                        <div class="alert alert-danger py-1 px-3 d-inline-block mt-2">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            <small class="fw-bold">Minimal 70% dibutuhkan untuk diagnosis akurat</small>
                        </div>
                    </div>
                </div>

                <!-- Deteksi Sementara -->
                <div class="alert alert-info mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-binoculars me-2"></i>
                        Hasil Analisis Sementara
                    </h5>
                    
                     <div class="row">
                        <div class="col-md-8">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">
                                        <i class="fas fa-disease me-2"></i>
                                        Kemungkinan Penyakit
                                    </h5>
                                    <h3 class="fw-bold text-primary mb-3">{{ $penyakit }}</h3>
                                    
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="p-2 bg-light rounded">
                                                <h4 class="fw-bold text-success mb-0">{{ $matched }}</h4>
                                                <small class="text-muted">Gejala Cocok</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-2 bg-light rounded">
                                                <h4 class="fw-bold text-primary mb-0">{{ $total_gejala_penyakit }}</h4>
                                                <small class="text-muted">Total Gejala Penyakit</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-2 bg-light rounded">
                                                <h4 class="fw-bold text-warning mb-0">{{ $selected_gejala_count }}</h4>
                                                <small class="text-muted">Gejala Dipilih</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-body">
                                     
                                    <h5 class="card-title text-success">
                                        <i class="fas fa-calculator me-2"></i>
                                        Perhitungan
                                    </h5>
                                    <p class="small mb-2">
                                        <strong>{{ $matched }} dari {{ $total_gejala_penyakit }}</strong> gejala cocok
                                    </p>
                                    <div class="alert alert-warning py-2">
                                        <small>
                                            <i class="fas fa-lightbulb me-1"></i>
                                            Butuh tambahan gejala lain 
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 

                <!-- Action Buttons -->
                <!-- Action Buttons - Improved Version -->
<div class="border-top pt-4 mt-3">
    <div class="text-center mb-4">
        <h5 class="fw-bold text-primary mb-3">
            <i class="fas fa-plus-circle me-2"></i>
            Apa yang ingin Anda lakukan?
        </h5>
        <p class="text-muted small">Pilih salah satu tindakan berikut</p>
    </div>
    
    <div class="row g-3 justify-content-center">
        <!-- Tambah Gejala Button -->
        <div class="col-lg-5 col-md-6">
            <div class="card card-hover border-warning shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="fas fa-plus-circle text-warning fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Tambah Gejala Lain</h6>
                            
                            <a href="{{ route('diagnosis.form') }}" class="btn btn-warning w-100 py-2">
                                <i class="fas fa-plus me-2"></i>Tambah Gejala
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mulai Baru Button -->
        <div class="col-lg-5 col-md-6">
            <div class="card card-hover border-secondary shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start">
                        <div class="rounded-circle bg-secondary bg-opacity-10 p-3 me-3">
                            <i class="fas fa-redo text-secondary fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Mulai Diagnosis Baru</h6>
                            
                            <a href="{{ route('diagnosa.reset') }}" class="btn btn-outline-secondary w-100 py-2">
                                <i class="fas fa-broom me-2"></i>Mulai Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cari Dokter Button - Center Bottom -->
    <div class="text-center mt-5">
        <div class="d-inline-block p-3 rounded-3 bg-light border">
            <p class="mb-2 fw-bold text-dark">
                <i class="fas fa-stethoscope me-2 text-primary"></i>
                Butuh bantuan profesional?
            </p>
            <a href="https://www.google.com/maps/search/dokter+hewan+terdekat" 
               target="_blank" 
               class="btn btn-primary px-4 py-2">
                <i class="fas fa-ambulance me-2"></i>Cari Dokter Hewan Terdekat
            </a>
            <p class="small text-muted mt-2 mb-0">Konsultasi langsung untuk diagnosis yang lebih akurat</p>
        </div>
    </div>
</div>

                <!-- Quick Tips -->
                <div class="alert alert-light border mt-4">
                    <h6 class="fw-bold mb-2">
                        <i class="fas fa-tips me-1"></i> Tips Menambah Gejala:
                    </h6>
                    <ul class="mb-0">
                        <li>Periksa gejala <strong>sistemik</strong> seperti demam, lemas, nafsu makan</li>
                        <li>Amati <strong>perubahan perilaku</strong> dalam 24 jam terakhir</li>
                        <li>Perhatikan <strong>pernapasan, mata, mulut, kulit, dan pencernaan</strong></li>
                        <li>Catat jika ada gejala <strong>perkemihan atau reproduksi</strong> yang tidak normal</li>
                    </ul>
                </div>
            </div>
        </div>

    @else
        {{-- TAMPILAN NORMAL JIKA ≥ 70% --}}
        
        @if(empty($hasil) || count($hasil) === 0)
            <!-- No Result -->
            <div class="alert alert-warning">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>
                        <h6 class="mb-1">Tidak ditemukan diagnosis</h6>
                        <p class="mb-0 small">Tidak ada penyakit yang cocok dengan gejala yang dipilih.</p>
                    </div>
                </div>
            </div>
        
        @else
            @php
                $p = $hasil[0];
                $nama = $p['penyakit'] ?? $p['nama'] ?? '-';
                $kode = $p['kode'] ?? '-';
                $persen = $p['persentase'] ?? 0;
                $jumlah = $p['jumlah'] ?? $p['matched'] ?? 0;
                $data = $p['info'] ?? [];
            @endphp

            <!-- Warning Multiple Results -->
            @if($multipleResults && !empty($alternatifPenyakit))
                <div class="alert alert-warning mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
                        <div>
                            <h6 class="mb-1">⚠️ Ditemukan {{ count($alternatifPenyakit) + 1 }} Kemungkinan</h6>
                            <p class="mb-2 small">
                                Sistem mendeteksi beberapa penyakit dengan tingkat kecocokan sama tinggi ({{ $persen }}%).
                                Konsultasi dokter hewan untuk diagnosis pasti.
                            </p>
                            
                            <div class="mt-2">
                                <small class="fw-bold">Alternatif diagnosis:</small>
                                <ul class="mb-0 small">
                                    @foreach($alternatifPenyakit as $alt)
                                        <li>
                                            <strong>{{ $alt['nama'] }}</strong> 
                                            - {{ $alt['persentase'] }}% 
                                            ({{ $alt['jumlah'] }} gejala cocok)
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Result Header -->
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 fw-bold">
                                <i class="fas fa-diagnoses me-1"></i>Hasil Diagnosis
                                @if($multipleResults)
                                    <span class="badge bg-warning ms-2">Salah Satu Kemungkinan</span>
                                @endif
                            </h6>
                            <small class="opacity-75">{{ date('d M Y, H:i') }}</small>
                        </div>
                        <div class="badge bg-light text-primary">
                            {{ $jumlah }} gejala cocok
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-3">
                    <!-- Disease Info -->
                    <div class="mb-3">
                        <h5 class="fw-bold text-primary mb-1">{{ $nama }}</h5>
                        <div class="d-flex flex-wrap gap-1 mb-2">
                            <span class="badge bg-secondary">Kode: {{ $kode }}</span>
                            <span class="badge bg-success">Sistem Pakar</span>
                            @if($multipleResults)
                                <span class="badge bg-warning">
                                    {{ count($alternatifPenyakit) + 1 }} kemungkinan
                                </span>
                            @endif
                        </div>
                        
                        <!-- Persentase -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <div class="progress" style="width: 150px; height: 10px;">
                                    <div class="progress-bar 
                                        @if($persen >= 70) bg-success
                                        @elseif($persen >= 40) bg-warning
                                        @else bg-danger
                                        @endif" 
                                        role="progressbar" 
                                        style="width: {{ $persen }}%">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <strong class="fs-5">{{ $persen }}%</strong>
                                <small class="text-muted d-block">Tingkat kecocokan</small>
                            </div>
                        </div>
                    </div>

                    <!-- Information Tabs -->
                    <ul class="nav nav-tabs mb-3" id="infoTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="gejala-tab" data-bs-toggle="tab" data-bs-target="#gejala" type="button">
                                <i class="fas fa-stethoscope me-1"></i>Gejala
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penyebab-tab" data-bs-toggle="tab" data-bs-target="#penyebab" type="button">
                                <i class="fas fa-virus me-1"></i>Penyebab
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mandiri-tab" data-bs-toggle="tab" data-bs-target="#mandiri" type="button">
                                <i class="fas fa-home me-1"></i>Penanganan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dokter-tab" data-bs-toggle="tab" data-bs-target="#dokter" type="button">
                                <i class="fas fa-ambulance me-1"></i>Ke Dokter
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="infoTabsContent">
                        <!-- Gejala Tab -->
                        <div class="tab-pane fade show active" id="gejala" role="tabpanel">
                            <div class="alert alert-light border">
                                <h6 class="fw-bold mb-2">Gejala Utama:</h6>
                                <ul class="mb-0">
                                    @if(is_array($data['gejala_utama'] ?? []))
                                        @foreach($data['gejala_utama'] as $gejala)
                                            <li>{{ $gejala }}</li>
                                        @endforeach
                                    @else
                                        <li>{{ $data['gejala_utama'] ?? 'Informasi gejala sedang diperbarui' }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Penyebab Tab -->
                        <div class="tab-pane fade" id="penyebab" role="tabpanel">
                            <div class="alert alert-light border">
                                <h6 class="fw-bold mb-2">Perilaku & Penyebab:</h6>
                                <p class="mb-0">{{ $data['perilaku_penyebab'] ?? 'Konsultasikan dengan dokter hewan' }}</p>
                            </div>
                        </div>

                        <!-- Penanganan Mandiri Tab -->
                        <div class="tab-pane fade" id="mandiri" role="tabpanel">
                            <div class="alert alert-light border">
                                <h6 class="fw-bold mb-2">Penanganan Mandiri:</h6>
                                @if(strpos($data['penanganan_mandiri'] ?? '', '🚫') !== false)
                                    <div class="alert alert-danger py-2 mb-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $data['penanganan_mandiri'] ?? '' }}
                                    </div>
                                @else
                                    <p class="mb-0">{{ $data['penanganan_mandiri'] ?? 'Konsultasikan dengan dokter hewan' }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Ke Dokter Tab -->
                        <div class="tab-pane fade" id="dokter" role="tabpanel">
                            <div class="alert alert-light border">
                                <h6 class="fw-bold mb-2">Segera ke Dokter Jika:</h6>
                                <div class="alert alert-warning py-2">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    {{ $data['ke_dokter'] ?? 'Segera ke dokter hewan' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Disclaimer -->
                    <div class="alert alert-warning mt-3 py-2">
                        <small>
                            <i class="fas fa-exclamation-circle me-1"></i>
                            <strong>Disclaimer:</strong> Hasil diagnosis berdasarkan sistem pakar. 
                            @if($multipleResults)
                                <span class="fw-bold">Terdapat {{ count($alternatifPenyakit) + 1 }} kemungkinan penyakit dengan kecocokan sama tinggi.</span>
                            @endif
                            Konsultasi ke dokter hewan tetap diperlukan untuk diagnosis pasti.
                        </small>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-3 pt-2 border-top">
                        <a href="{{ route('diagnosis.form') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-redo me-1"></i>Diagnosis Baru
                        </a>
                        <div>
                            @if($multipleResults && isset($debug_semua_hasil))
                                <button class="btn btn-sm btn-outline-info me-1" type="button" 
                                        data-bs-toggle="collapse" data-bs-target="#debugCollapse">
                                    <i class="fas fa-bug me-1"></i>Debug
                                </button>
                            @endif
                            <button class="btn btn-sm btn-outline-secondary me-1" onclick="window.print()">
                                <i class="fas fa-print me-1"></i>Cetak
                            </button>
                            <a href="https://www.google.com/maps/search/dokter+hewan+terdekat" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fas fa-map-marker-alt me-1"></i>Cari Dokter
                            </a>
                        </div>
                    </div>
                    
                    <!-- Debug Info (Collapsible) -->
                    @if($multipleResults && isset($debug_semua_hasil))
                        <div class="collapse mt-3" id="debugCollapse">
                            <div class="card card-body bg-light">
                                <h6 class="fw-bold">Debug Info - Semua Hasil:</h6>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Penyakit</th>
                                            <th>Persentase</th>
                                            <th>Gejala Cocok</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($debug_semua_hasil as $index => $item)
                                            <tr class="@if($item['persentase'] == $persen) table-warning @endif">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['nama'] }}</td>
                                                <td>{{ $item['persentase'] }}%</td>
                                                <td>{{ $item['jumlah'] ?? $item['matched'] }}</td>
                                                <td>
                                                    @if($item['persentase'] == $persen)
                                                        <span class="badge bg-warning">Tertinggi</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endif
</div>

<style>
    /* Styles untuk warning mode */
    .progress-bar-striped {
        background-image: linear-gradient(
            45deg,
            rgba(255, 255, 255, 0.15) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.15) 50%,
            rgba(255, 255, 255, 0.15) 75%,
            transparent 75%,
            transparent
        );
        background-size: 1rem 1rem;
    }
    
    .btn-warning {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        border: none;
        color: #212529;
        font-weight: 600;
    }
    
    .btn-warning:hover {
        background: linear-gradient(135deg, #ffb300, #f57c00);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
    }
    
    /* Styles normal mode */
    .nav-tabs .nav-link {
        font-size: 0.85rem;
        padding: 0.4rem 0.8rem;
        color: #495057;
        border: none;
        margin-right: 2px;
    }
    
    .nav-tabs .nav-link.active {
        background-color: #e8f4fd;
        border-color: #dee2e6 #dee2e6 #e8f4fd;
        color: #0d6efd;
        font-weight: 500;
    }
    
    .tab-content {
        min-height: 180px;
    }
    
    .progress {
        background-color: #e9ecef;
    }
    
    .alert-light {
        background-color: #f8f9fa;
    }
</style>
@endsection