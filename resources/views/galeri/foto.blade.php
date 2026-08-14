@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Galeri Foto</h1>
    
    <style>
        .album-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .album-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .album-img-wrapper {
            overflow: hidden;
        }
        .album-img-wrapper img {
            transition: transform 0.5s ease;
        }
        .album-card:hover .album-img-wrapper img {
            transform: scale(1.1);
        }
    </style>
    
    <div class="row g-4">
        @forelse($albums as $album)
        <div class="col-md-4">
            <a href="{{ route('galeri.foto.detail', $album->album_seo) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm border-0 album-card">
                    <div class="album-img-wrapper">
                        @if($album->gbr_album)
                        <img src="{{ asset('storage/' . $album->gbr_album) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $album->jdl_album }}">
                        @else
                        <img src="https://via.placeholder.com/300x200.png/eee/999?text=No+Cover" class="card-img-top object-fit-cover" style="height: 200px;" alt="No Cover">
                        @endif
                    </div>
                    <div class="card-body text-center bg-light">
                        <h5 class="card-title fw-bold mb-1" style="font-size:16px; color:#074174;">{{ $album->jdl_album }}</h5>
                        <small class="text-muted"><i class="fas fa-images"></i> Klik untuk melihat foto</small>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada album foto.</p>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $albums->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
