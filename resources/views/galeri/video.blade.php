@extends('layouts.app')

@section('title', 'Galeri Video')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Galeri Video</h1>
    
    <div class="row g-4">
        @forelse($videos as $video)
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ str_replace('watch?v=', 'embed/', $video->youtube_url) }}" title="{{ $video->judul }}" allowfullscreen></iframe>
                </div>
                <div class="card-body px-0 pt-3 pb-0">
                    <h5 class="card-title fw-bold" style="font-size:16px;">{{ $video->judul }}</h5>
                    @if($video->keterangan)
                        <p class="card-text text-muted" style="font-size:14px;">{{ $video->keterangan }}</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada video.</p>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $videos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
