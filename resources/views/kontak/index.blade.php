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
                <li class="mb-2"><i class="fas fa-envelope text-primary me-2" style="width: 20px;"></i> {{ $identitas->email ?? '-' }}</li>
                <li class="mb-2"><i class="fas fa-phone-alt text-success me-2" style="width: 20px;"></i> {{ $identitas->no_telp ?? '-' }}</li>
            </ul>

            <h5 class="fw-bold mt-4" style="color:#074174;">Media Sosial</h5>
            <ul class="list-unstyled mt-3" style="font-size: 15px; line-height: 1.8;">
                @if(isset($identitas->sosmed) && is_array($identitas->sosmed))
                    @foreach($identitas->sosmed as $sm)
                        @php
                            $icon = 'fas fa-link text-secondary';
                            $url = strtolower($sm['url']);
                            if(str_contains($url, 'facebook')) $icon = 'fab fa-facebook text-primary';
                            elseif(str_contains($url, 'instagram')) $icon = 'fab fa-instagram text-danger';
                            elseif(str_contains($url, 'twitter') || str_contains($url, 'x.com')) $icon = 'fab fa-twitter text-info';
                            elseif(str_contains($url, 'youtube')) $icon = 'fab fa-youtube text-danger';
                            elseif(str_contains($url, 'linkedin')) $icon = 'fab fa-linkedin text-primary';
                            elseif(str_contains($url, 'tiktok')) $icon = 'fab fa-tiktok text-dark';
                        @endphp
                        <li class="mb-2">
                            <i class="{{ $icon }} me-2" style="width: 20px;"></i> 
                            <a href="{{ $sm['url'] }}" target="_blank" class="text-decoration-none text-dark">{{ $sm['name'] }}</a>
                        </li>
                    @endforeach
                @else
                    <li class="mb-2 text-muted">Belum ada tautan media sosial.</li>
                @endif
            </ul>
        </div>
        
        <div class="col-md-7">
            <h5 class="fw-bold" style="color:#074174;">Lokasi Kami</h5>
            <div class="mt-3 w-100" style="min-height: 300px;">
                @if(!empty($identitas->maps))
                    <div class="ratio ratio-16x9">
                        {!! $identitas->maps !!}
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted border h-100" style="min-height:300px;">
                        Peta lokasi belum diatur.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
