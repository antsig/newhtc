@extends('layouts.app')

@section('title', 'Kategori Pelatihan: ' . ucfirst(str_replace('-', ' ', $slug)))

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Pelatihan: {{ $kategoriNama }}</h1>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse($pelatihans as $pelatihan)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                @if($pelatihan->gambar)
                <img src="{{ Storage::url($pelatihan->gambar) }}" class="card-img-top object-fit-cover" style="height: 180px;" alt="{{ $pelatihan->judul }}">
                @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                    <i class="fas fa-chalkboard-teacher fa-3x text-secondary"></i>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color:#074174;">{{ $pelatihan->judul }}</h5>
                    @if($pelatihan->jadwal)
                    <div class="text-danger mb-2 fw-bold" style="font-size:13px;">
                        <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($pelatihan->jadwal)->translatedFormat('d M Y') }}
                    </div>
                    @endif
                    <p class="card-text text-muted" style="font-size: 14px;">{!! Str::limit(strip_tags($pelatihan->isi_pelatihan), 100) !!}</p>
                </div>
                <div class="card-footer bg-white border-0 pt-0">
                    <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Belum ada kelas pelatihan untuk kategori ini.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
