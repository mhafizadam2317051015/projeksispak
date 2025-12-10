<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Pakar Diagnosis Kucing')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --light-bg: #f8fafc;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .navbar-brand {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .nav-link {
            font-weight: 500;
            transition: all 0.3s;
            border-radius: 8px;
            padding: 8px 16px !important;
        }
        
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #6366f1);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }
        
        .badge-category {
            font-size: 0.8rem;
            padding: 5px 12px;
            border-radius: 20px;
            margin-right: 8px;
        }
        
        .symptom-checkbox {
            transform: scale(1.1);
            margin-right: 10px;
        }
        
        .result-card {
            background: white;
            border-left: 5px solid var(--secondary-color);
            animation: fadeIn 0.5s ease;
        }
        
        .progress-circle {
            width: 120px;
            height: 120px;
            position: relative;
            margin: 0 auto;
        }
        
        .progress-circle svg {
            transform: rotate(-90deg);
        }
        
        .percentage-display {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .info-section {
            background: #e8f4fd;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .accordion-button:not(.collapsed) {
            background-color: #e8f4fd;
            color: var(--primary-color);
        }
        
        footer {
            background: rgba(0, 0, 0, 0.9);
            color: white;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-paw me-2"></i>CatDiagnosis Expert
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/diagnosa">
                            <i class="fas fa-stethoscope me-1"></i> Diagnosis
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book me-1"></i> Panduan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-phone-alt me-1"></i> Kontak
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">
                <i class="fas fa-heart text-danger"></i> Sistem Pakar Diagnosis Penyakit Kucing 
                &copy; {{ date('Y') }} | Sistem Forward Chaining
            </p>
            <small class="text-light">Hanya untuk referensi, konsultasikan dengan dokter hewan untuk diagnosis pasti</small>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Animasi progress bar untuk hasil
        document.addEventListener('DOMContentLoaded', function() {
            const percentageElements = document.querySelectorAll('.percentage-display');
            percentageElements.forEach(el => {
                const percentage = parseFloat(el.textContent);
                if(percentage > 0) {
                    setTimeout(() => {
                        el.style.color = percentage >= 70 ? '#10b981' : 
                                        percentage >= 40 ? '#f59e0b' : '#ef4444';
                    }, 300);
                }
            });
        });
    </script>
    
</body>
</html>