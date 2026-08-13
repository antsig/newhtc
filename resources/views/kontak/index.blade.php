@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Hubungi Kami</h1>
    
    <div class="row g-4">
        <div class="col-md-5">
            <h5 class="fw-bold" style="color:#074174;">Informasi Kontak</h5>
            <ul class="list-unstyled mt-3" style="font-size: 15px; line-height: 1.8;">
                <li class="mb-2"><i class="fas fa-map-marker-alt text-danger me-2" style="width: 20px;"></i> {{ $identitas->maps ?? 'Alamat belum diset' }}</li>
                <li class="mb-2"><i class="fas fa-envelope text-primary me-2" style="width: 20px;"></i> {{ $identitas->email ?? '-' }}</li>
                <li class="mb-2"><i class="fas fa-phone-alt text-success me-2" style="width: 20px;"></i> {{ $identitas->no_telp ?? '-' }}</li>
                <li class="mb-2"><i class="fab fa-facebook text-primary me-2" style="width: 20px;"></i> <a href="{{ $identitas->facebook ?? '#' }}" target="_blank" class="text-decoration-none">Facebook Page</a></li>
            </ul>
        </div>
        
        <div class="col-md-7">
            <h5 class="fw-bold" style="color:#074174;">Kirim Pesan</h5>
            <form action="#" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold" style="font-size:14px;">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" style="font-size:14px;">Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Masukkan alamat email">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" style="font-size:14px;">Pesan</label>
                    <textarea class="form-control" name="pesan" rows="4" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" onclick="alert('Fitur pesan belum terhubung ke database. Silakan hubungi via Whatsapp.'); return false;">
                    <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
