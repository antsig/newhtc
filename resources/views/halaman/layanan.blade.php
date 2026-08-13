@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Layanan Kami</h1>
    
    <div class="row g-4">
        @forelse($layanans as $layanan)
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                @if($layanan->gambar)
                <img src="{{ Storage::url($layanan->gambar) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $layanan->judul }}">
                @else
                <img src="https://via.placeholder.com/400x250.png/074174/fff?text=Layanan" class="card-img-top object-fit-cover" style="height: 200px;" alt="Layanan">
                @endif
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color:#074174;">{{ $layanan->judul }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($layanan->isi_halaman), 100) }}</p>
                    <a href="{{ url('halaman/'.$layanan->judul_seo) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Belum ada data layanan.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
