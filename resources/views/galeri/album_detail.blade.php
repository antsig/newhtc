@extends('layouts.app')

@section('title', $album->jdl_album)

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<!-- Include GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

<style>
    .photo-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        cursor: pointer;
    }
    .photo-card img {
        transition: transform 0.5s ease;
        display: block;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(7, 65, 116, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .photo-overlay i {
        color: white;
        font-size: 2rem;
        transform: scale(0.5);
        transition: transform 0.3s ease;
    }
    .photo-card:hover img {
        transform: scale(1.1);
    }
    .photo-card:hover .photo-overlay {
        opacity: 1;
    }
    .photo-card:hover .photo-overlay i {
        transform: scale(1);
    }
</style>

<div class="bg-white border p-4 mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('galeri.foto') }}" class="text-decoration-none text-primary">Galeri Foto</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $album->jdl_album }}</li>
        </ol>
    </nav>
    
    <h1 class="fw-bold mb-3" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">{{ $album->jdl_album }}</h1>
    
    @if($album->keterangan)
        <p class="text-muted mb-4">{{ $album->keterangan }}</p>
    @endif
    
    @if(!empty($album->photos) && is_array($album->photos) && count($album->photos) > 0)
        <div class="row g-3">
            @foreach($album->photos as $photo)
            <div class="col-md-4 col-sm-6">
                <a href="{{ asset('storage/' . $photo) }}" class="glightbox" data-gallery="album-{{ $album->id_album }}">
                    <div class="photo-card">
                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo {{ $loop->iteration }}">
                        <div class="photo-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center py-5">
            <i class="fas fa-images fa-3x mb-3 text-secondary"></i>
            <h5>Belum ada foto dalam album ini.</h5>
        </div>
    @endif
</div>

<!-- Include GLightbox JS -->
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    });
</script>
@endsection
