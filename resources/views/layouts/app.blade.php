<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTC Pajak - @yield('title', 'Pusat Pelatihan Pajak')</title>
    <!-- Bootstrap CSS for layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { background: #f8f9fa; padding: 15px; border-radius: 5px; }
        .main-content { padding: 15px; }
        .footer { background: #343a40; color: white; padding: 20px 0; text-align: center; margin-top: 40px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">HTC Pajak</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Agenda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 3 Column Layout -->
    <div class="container">
        <div class="row">
            
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="sidebar">
                    <h5>Kategori</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent">Pajak</li>
                        <li class="list-group-item bg-transparent">Akuntansi</li>
                        <li class="list-group-item bg-transparent">Hukum</li>
                        <li class="list-group-item bg-transparent">Pelatihan</li>
                    </ul>

                    <h5 class="mt-4">Album</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Example placeholder for album -->
                        <div class="bg-secondary text-white text-center p-2" style="width: 100%; height: 100px;">Galeri Kegiatan</div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6 main-content">
                @yield('content')
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <div class="sidebar">
                    <h5>Agenda Terbaru</h5>
                    <div class="card mb-3">
                        <div class="card-body p-2">
                            <h6 class="card-title">Pelatihan Brevet</h6>
                            <p class="card-text small text-muted">20 Nov 2024</p>
                        </div>
                    </div>
                    
                    <h5>Polling</h5>
                    <form>
                        <div class="form-check small">
                            <input class="form-check-input" type="radio" name="polling" id="poll1">
                            <label class="form-check-label" for="poll1">Sangat Bermanfaat</label>
                        </div>
                        <div class="form-check small">
                            <input class="form-check-input" type="radio" name="polling" id="poll2">
                            <label class="form-check-label" for="poll2">Cukup Bermanfaat</label>
                        </div>
                        <button class="btn btn-sm btn-primary mt-2">Kirim</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Pusat Pelatihan Pajak - HTC Training & Consulting</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
