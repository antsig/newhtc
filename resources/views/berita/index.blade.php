@extends('layouts.app')

@section('title', 'Semua Berita')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Semua Berita</h1>
    
    @forelse($berita as $item)
    <div class="card mb-3 border-0 border-bottom rounded-0 pb-3">
        <div class="row g-0">
            <div class="col-md-4">
                @if($item->gambar)
                <img src="{{ Storage::url($item->gambar) }}" class="img-fluid rounded" alt="{{ $item->judul }}">
                @else
                <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" alt="No Image">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body py-0">
                    <h5 class="card-title fw-bold mb-1">
                        <a href="{{ url('berita/'.$item->judul_seo) }}" class="text-decoration-none text-dark">{{ $item->judul }}</a>
                    </h5>
                    <p class="card-text text-muted mb-2" style="font-size:12px;">
                        <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }} &nbsp;
                        <i class="far fa-eye"></i> {{ $item->dibaca }} views
                    </p>
                    <p class="card-text" style="font-size:14px;">
                        {{ Str::limit(strip_tags($item->isi_berita), 120) }}
                    </p>
                    <a href="{{ url('berita/'.$item->judul_seo) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info">Belum ada berita.</div>
    @endforelse

    <div class="d-flex justify-content-center mt-4">
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
