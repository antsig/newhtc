@extends('layouts.app')

@section('title', $berita->judul)

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ url('kategori/'.$berita->kategori->kategori_seo) }}" class="text-decoration-none">{{ $berita->kategori->nama_kategori }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <h1 class="fw-bold mb-3" style="color:#074174;">{{ $berita->judul }}</h1>
    
    <div class="d-flex align-items-center text-muted mb-4" style="font-size: 14px;">
        <span class="me-3"><i class="far fa-calendar-alt"></i> {{ $berita->hari }}, {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}</span>
        <span class="me-3"><i class="far fa-clock"></i> {{ $berita->jam }} WIB</span>
        <span class="me-3"><i class="far fa-user"></i> {{ $berita->username }}</span>
        <span><i class="far fa-eye"></i> Dilihat {{ $berita->dibaca }} kali</span>
    </div>

    @if($berita->gambar)
        <div class="mb-4 text-center">
            <img src="{{ Storage::url($berita->gambar) }}" class="img-fluid rounded" alt="{{ $berita->judul }}">
        </div>
    @endif

    @if($berita->youtube)
        <div class="ratio ratio-16x9 mb-4">
            <iframe src="{{ str_replace('watch?v=', 'embed/', $berita->youtube) }}" allowfullscreen></iframe>
        </div>
    @endif

    <div class="berita-content" style="font-size: 16px; line-height: 1.8; color:#333;">
        {!! $berita->isi_berita !!}
    </div>
</div>
@endsection
