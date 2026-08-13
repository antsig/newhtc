@extends('layouts.app')

@section('title', 'Beranda')

@section('left-sidebar')
    <!-- Akreditasi Image -->
    <div class="mb-3 bg-white" style="border: 4px solid #fcf2e3; padding:2px;">
        <img src="https://via.placeholder.com/300x400.png/fff0e0/b38247?text=SERTIFIKAT+AKREDITASI" class="img-fluid w-100 object-fit-cover" alt="Sertifikat Akreditasi" style="height:250px;">
    </div>

    <!-- Banner Butuh Staff -->
    <div class="mb-4">
        <div style="background-color: #0d47a1; color: white; padding: 15px; text-align: center; border: 2px solid #ddd;">
            <p style="font-size: 14px; font-weight: bold; margin-bottom: 5px; font-style: italic;">Training & Consulting</p>
            <h4 class="fw-bold mb-3" style="text-transform: uppercase;">BUTUH STAFF PERPAJAKAN<br>HUBUNGI KAMI</h4>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <i class="fas fa-phone-alt fs-4 text-danger me-2"></i>
                <span class="fw-bold" style="font-size: 16px; color:#ffc107;">0274-2885536</span>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <i class="fab fa-whatsapp fs-4 text-success me-2"></i>
                <span class="fw-bold" style="font-size: 16px; color:#ffc107;">0853-3188-7878</span>
            </div>
        </div>
    </div>

    <!-- Foto Terbaru -->
    <div class="sidebar-title mb-0">FOTO TERBARU</div>
    <div class="bg-white border p-0 mb-4 position-relative">
        @if($albumTerbaru)
            <img src="{{ $albumTerbaru->gbr_album ? Storage::url($albumTerbaru->gbr_album) : 'https://via.placeholder.com/250x200.png' }}" class="img-fluid w-100 object-fit-cover" style="height:200px;" alt="{{ $albumTerbaru->jdl_album }}">
            <div class="position-absolute text-white text-center w-100" style="bottom:10px; font-size:12px; background:rgba(0,0,0,0.6); padding:5px;">
                {{ $albumTerbaru->jdl_album }}
            </div>
        @else
            <div class="text-center p-3 text-muted">Belum ada foto.</div>
        @endif
        <div class="p-2">
            <a href="{{ url('/galeri/foto') }}" class="btn btn-sm btn-light border w-100 rounded-0" style="font-size:12px; color:#555;">View All Photo</a>
        </div>
    </div>

    <!-- Video Terbaru -->
    <div class="sidebar-title mb-0">VIDEO TERBARU</div>
    <div class="bg-white border p-0 mb-4 text-center">
        @if(isset($videoTerbaru) && $videoTerbaru)
            <div class="ratio ratio-16x9">
                <iframe src="{{ str_replace('watch?v=', 'embed/', $videoTerbaru->youtube_url) }}" allowfullscreen></iframe>
            </div>
            <div class="p-2 border-bottom" style="font-size:12px; color:#555;">
                {{ $videoTerbaru->judul }}
            </div>
        @else
            <div style="background:#000; width:100%; height:180px; display:flex; align-items:center; justify-content:center;">
                <i class="fas fa-play-circle text-white opacity-50" style="font-size:3rem;"></i>
            </div>
            <div class="p-2 border-bottom text-muted" style="font-size:12px;">Belum ada video.</div>
        @endif
        <div class="p-2">
            <a href="{{ url('/galeri/video') }}" class="btn btn-sm btn-light border w-100 rounded-0" style="font-size:12px; color:#555;">View All Video</a>
        </div>
    </div>
@endsection

@section('content')
    <!-- Carousel -->
    <div class="mb-3 border bg-white p-1">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators mb-0 pb-2 pe-2 justify-content-end" style="right:0; bottom:0; left:auto; margin-right:0;">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active rounded-0" aria-current="true" style="width:12px; height:12px; opacity: 1; border: 1px solid #aaa;"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" class="rounded-0" style="width:12px; height:12px; opacity: 0.6; border: 1px solid #aaa;"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" class="rounded-0" style="width:12px; height:12px; opacity: 0.6; border: 1px solid #aaa;"></button>
            </div>
            <div class="carousel-inner position-relative">
                @foreach($carouselNews as $index => $news)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <a href="{{ url('berita/'.$news->judul_seo) }}" class="text-decoration-none">
                        <img src="{{ $news->gambar ? Storage::url($news->gambar) : 'https://via.placeholder.com/800x400.png?text='.urlencode($news->judul) }}" class="d-block w-100 object-fit-cover" alt="{{ $news->judul }}" style="height:350px;">
                        <div class="carousel-caption d-none d-md-block text-start" style="right:0; left:0; bottom:0; padding:15px; background: rgba(0,0,0,0.6);">
                            <h5 class="mb-0 text-white fw-bold" style="font-size:16px;">{{ $news->judul }}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- Controls overlay -->
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev" style="width:40px; height:40px; top:50%; transform:translateY(-50%); left:10px; border:1px solid white; border-radius:50%; opacity:0.8; background:transparent;">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="width:1rem; height:1rem;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next" style="width:40px; height:40px; top:50%; transform:translateY(-50%); right:10px; border:1px solid white; border-radius:50%; opacity:0.8; background:transparent;">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="width:1rem; height:1rem;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru Header -->
    <div class="d-flex justify-content-between align-items-center sidebar-title mb-0">
        <span class="fw-bold">BERITA TERBARU</span>
        <a href="#" class="text-white text-decoration-none" style="font-size:12px;">+ Indeks Berita</a>
    </div>
    
    <!-- Berita List -->
    <div class="bg-white border p-3 pt-0 mb-4">
        @foreach($beritaTerbaru as $news)
        <div class="row align-items-start py-3 border-bottom">
            <div class="col-4 pe-0">
                <img src="{{ $news->gambar ? asset('storage/'.$news->gambar) : 'https://via.placeholder.com/150x100.png' }}" class="img-fluid w-100 object-fit-cover" alt="News Image" style="height:100px;">
            </div>
            <div class="col-8">
                <h6 class="fw-bold mb-1" style="font-size: 14px; line-height: 1.3;">
                    <a href="{{ url('berita/'.$news->judul_seo) }}" class="text-dark text-decoration-none">{{ $news->judul }}</a>
                </h6>
                <div class="text-muted mb-1" style="font-size:11px;">
                    <span class="fw-bold text-primary">{{ $news->kategori->nama_kategori ?? 'Berita' }}</span> &nbsp;
                    <i class="far fa-clock"></i> {{ $news->jam }}, {{ \Carbon\Carbon::parse($news->tanggal)->format('d M Y') }}
                </div>
                <p class="mb-0 text-muted" style="font-size:12px; line-height:1.4;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($news->isi_berita), 80) }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('right-sidebar')
    <!-- Button Butuh Staf -->
    <div style="background-color: #074174; color: white; padding: 10px; font-weight: bold; font-size: 14px; text-align: center; text-transform: uppercase;">
        BUTUH STAF PAJAK ?
    </div>
    <div class="bg-white border text-center p-3 mb-4">
        <a href="#" class="text-dark fw-bold text-decoration-none" style="font-size: 16px;">Klik disini !</a>
    </div>

    <!-- Social Media -->
    <div class="sidebar-title mb-0 text-center">TEMUKAN JUGA KAMI DI</div>
    <div class="bg-white border p-2 text-center mb-4">
        <div class="row g-1 mb-2">
            <div class="col-6">
                <a href="#" class="btn btn-sm text-white w-100 rounded-0" style="background:#3b5998; font-size:12px; font-weight:bold;">Facebook</a>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-sm text-white w-100 rounded-0" style="background:#55acee; font-size:12px; font-weight:bold;">Twitter</a>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-sm text-white w-100 rounded-0" style="background:#3f729b; font-size:12px; font-weight:bold;">Instagram</a>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-sm text-white w-100 rounded-0" style="background:#cd201f; font-size:12px; font-weight:bold;">Youtube</a>
            </div>
        </div>
        <p class="mb-0 text-muted" style="font-size:11px; line-height: 1.4;">
            Ikuti kami di facebook, twitter, Instagram, Youtube dan dapatkan informasi terbaru dari kami disana.
        </p>
    </div>

    <div class="sidebar-title mb-0">BERITA UTAMA</div>
    <div class="bg-white border p-3">
        @forelse($breakingNews as $news)
        <div class="d-flex mb-3 align-items-start {{ !$loop->last ? 'border-bottom pb-2' : '' }}">
            <img src="{{ $news->gambar ? Storage::url($news->gambar) : 'https://via.placeholder.com/60.png/074174/ffffff' }}" class="me-2 flex-shrink-0" style="width:60px; height:60px; object-fit:cover;" alt="Berita Utama">
            <div>
                <a href="{{ url('berita/'.$news->judul_seo) }}" class="text-dark fw-bold text-decoration-none d-block mb-1" style="font-size:12px; line-height:1.2;">{{ $news->judul }}</a>
                <div class="text-muted" style="font-size:10px;"><i class="far fa-clock text-danger"></i> {{ $news->jam }}, {{ \Carbon\Carbon::parse($news->tanggal)->format('d M Y') }}</div>
            </div>
        </div>
        @empty
        <p class="text-muted text-center" style="font-size: 12px;">Belum ada berita utama</p>
        @endforelse
    </div>

    <!-- Berita Populer -->
    <div class="sidebar-title mb-0 mt-4">BERITA POPULER</div>
    <div class="bg-white border p-3">
        @foreach($beritaPopuler as $news)
        <div class="d-flex mb-3 align-items-start border-bottom pb-2">
            <img src="{{ $news->gambar ? Storage::url($news->gambar) : 'https://via.placeholder.com/60x40.png' }}" class="me-2 flex-shrink-0" style="width:60px; height:40px; object-fit:cover;" alt="Berita Populer">
            <div>
                <a href="{{ url('berita/'.$news->judul_seo) }}" class="text-dark text-decoration-none d-block mb-1" style="font-size:12px; line-height:1.2;">{{ $news->judul }}</a>
                <div class="text-muted" style="font-size:10px;"><i class="far fa-clock text-primary"></i> {{ $news->jam }}, {{ \Carbon\Carbon::parse($news->tanggal)->format('d M Y') }}</div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
