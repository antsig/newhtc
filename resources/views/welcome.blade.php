@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="mb-4">
        <!-- Banner Carousel -->
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/800x400.png?text=Banner+HTC+Pajak" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400.png?text=Pelatihan+Brevet+A+B" class="d-block w-100" alt="Banner 2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Berita Utama -->
    <h3 class="mb-3 border-bottom pb-2">Berita Terkini</h3>
    
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/200" class="img-fluid rounded-start h-100 object-fit-cover" alt="Berita">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Pelatihan Pajak Aplikatif PPh</h5>
                    <p class="card-text small text-muted"><i class="bi bi-calendar"></i> 29 November 2024</p>
                    <p class="card-text">Alhamdulillah, HTC Training & Consulting telah sukses melaksanakan Pelatihan Pajak Aplikatif Pajak Penghasilan Pemotongan dan Pemungutan...</p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/200" class="img-fluid rounded-start h-100 object-fit-cover" alt="Berita">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Webinar Diskusi Aktual Pajak</h5>
                    <p class="card-text small text-muted"><i class="bi bi-calendar"></i> 6 November 2024</p>
                    <p class="card-text">Lembaga Konsultasi dan Bantuan Hukum Fakultas Hukum Universitas Islam Indonesia (LKBH FH UII) mengadakan diskusi aktual bertemakan Dilema Pembaharuan Pajak...</p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

@endsection
