@extends('layouts.app')

@section('title', $halaman->judul)

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">{{ $halaman->judul }}</h1>
    
    @if($halaman->gambar)
        <div class="mb-4 text-center">
            <img src="{{ Storage::url($halaman->gambar) }}" class="img-fluid rounded" alt="{{ $halaman->judul }}">
        </div>
    @endif

    <div class="halaman-content" style="font-size: 16px; line-height: 1.8; color:#333;">
        {!! $halaman->isi_halaman !!}
    </div>
</div>
@endsection
