<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatDiagnosis Expert - Sistem Pakar Diagnosis Penyakit Kucing</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #e8ecf3;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(90deg, #969eadff 0%, #4a7ac9 100%);
            padding: 1.2rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo::before {
            content: "🐾";
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background: rgba(255,255,255,0.2);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .hero-section {
            text-align: center;
            color: #5b4cdb;
            margin-bottom: 4rem;
        }

        .hero-title {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        /* .hero-title::before {
            content: "🐱";
            font-size: 3.5rem;
        } */

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .cta-button {
            background: #0d6efd;
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background: #0b5ed7;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            color: #3d6bb8;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: #666;
            line-height: 1.6;
        }

        .symptoms-preview {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .symptoms-title {
            color: #2d5aa6;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .symptom-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .symptom-category {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #2d5aa6;
        }

        .category-title {
            color: #2d5aa6;
            font-weight: bold;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .symptom-list {
            list-style: none;
            color: #555;
        }

        .symptom-list li {
            padding: 0.4rem 0;
            padding-left: 1.2rem;
            position: relative;
        }

        .symptom-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #ff6b6b;
            font-weight: bold;
        }

        .symptoms-preview {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .symptoms-title {
            color: #2d5aa6;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .symptom-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .symptom-category {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #2d5aa6;
        }

        .category-title {
            color: #2d5aa6;
            font-weight: bold;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .symptom-list {
            list-style: none;
            color: #555;
        }

        .symptom-list li {
            padding: 0.4rem 0;
            padding-left: 1.2rem;
            position: relative;
        }

        .symptom-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #ff6b6b;
            font-weight: bold;
        }

        .info-section {
            background: rgba(255,255,255,0.95);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .info-title {
            color: #3d6bb8;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .info-text {
            color: #666;
            line-height: 1.8;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        footer {
            background: #3d6bb8;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">CatDiagnosis Expert</div>
        <ul class="nav-links">
            <li><a href="">Beranda</a></li>
            <li><a href="diagnosa">Diagnosis</a></li>
            <!-- <li><a href="tentang">Tentang</a></li> -->
        </ul>
    </nav>
    <div class="container">
        <section class="hero-section">
            <h1 class="hero-title">Diagnosis Penyakit Kucing</h1>
            <p class="hero-subtitle">Pilih gejala sesuai kategori untuk analisis sistem pakar</p>
            <a href="diagnosa" class="cta-button">Mulai Diagnosis Sekarang</a>
        </section>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">🔬</div>
                <h3 class="feature-title">Diagnosis Akurat</h3>
                <p class="feature-description">Sistem berbasis aturan (rule-based system) dengan mesin inferensi forward chaining untuk diagnosis penyakit kucing berdasarkan gejala.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Hasil Cepat</h3>
                <p class="feature-description">Dapatkan hasil diagnosis dalam hitungan detik dengan analisis komprehensif dari gejala yang dipilih.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3 class="feature-title">Database Lengkap</h3>
                <p class="feature-description">Mencakup berbagai penyakit kucing dengan database gejala yang komprehensif dan ter-update.</p>
            </div>
        </div>

        <!-- <section class="symptoms-preview">
            <h2 class="symptoms-title">Kategori Gejala yang Tersedia</h2>
            <div class="symptom-categories">
                <div class="symptom-category">
                    <div class="category-title">🌡️ A. Sistemik</div>
                    <ul class="symptom-list">
                        <li>Demam tinggi</li>
                        <li>Lemas ekstrem</li>
                        <li>Tidak mau makan</li>
                        <li>Bulu kusam</li>
                        <li>Mata cekung</li>
                    </ul>
                </div>

                <div class="symptom-category">
                    <div class="category-title">🩺 B. Pencernaan</div>
                    <ul class="symptom-list">
                        <li>Muntah</li>
                        <li>Muntah berulang</li>
                        <li>Diare cair</li>
                        <li>Diare berdarah</li>
                        <li>Perut kembung</li>
                    </ul>
                </div>

                <div class="symptom-category">
                    <div class="category-title">🫁 C. Pernapasan</div>
                    <ul class="symptom-list">
                        <li>Sesak napas</li>
                        <li>Batuk</li>
                        <li>Bersin-bersin</li>
                        <li>Hidung berair</li>
                        <li>Napas berbunyi</li>
                    </ul>
                </div>

                <div class="symptom-category">
                    <div class="category-title">👁️ D. Mata & Mulut</div>
                    <ul class="symptom-list">
                        <li>Mata berair</li>
                        <li>Mata merah</li>
                        <li>Mulut berbau</li>
                        <li>Gusi berdarah</li>
                        <li>Ludah berlebih</li>
                    </ul>
                </div>

                <div class="symptom-category">
                    <div class="category-title">🦴 E. Kulit</div>
                    <ul class="symptom-list">
                        <li>Gatal-gatal</li>
                        <li>Kerontokan bulu</li>
                        <li>Kulit kemerahan</li>
                        <li>Benjolan kulit</li>
                        <li>Koreng/luka</li>
                    </ul>
                </div>

                <div class="symptom-category">
                    <div class="category-title">🐾 F. Perkemihan</div>
                    <ul class="symptom-list">
                        <li>Sulit buang air kecil</li>
                        <li>Sering buang air kecil</li>
                        <li>Urine berdarah</li>
                        <li>Urine keruh</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="info-section">
            <h2 class="info-title">Cara Menggunakan Sistem</h2>
            <p class="info-text">
                Pilih gejala-gejala yang dialami kucing Anda dari berbagai kategori yang tersedia. 
                Sistem akan menganalisis kombinasi gejala tersebut untuk memberikan diagnosis yang paling mungkin. 
                Hasil diagnosis ini dapat membantu Anda memahami kondisi kucing dan mengambil tindakan yang tepat.
            </p>
            <a href="#diagnosis" class="cta-button">Mulai Diagnosis</a>
        </section> -->
    </div>

    <footer>
        <p>&copy; 2024 CatDiagnosis Expert - Sistem Pakar Diagnosis Penyakit Kucing</p>
        <p>Konsultasikan dengan dokter hewan untuk diagnosis dan perawatan yang akurat</p>
    </footer>
</body>
</html>