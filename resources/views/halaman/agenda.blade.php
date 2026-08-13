@extends('layouts.app')

@section('title', 'Agenda')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Agenda & Kegiatan</h1>
    
    @forelse($agendas as $agenda)
    <div class="card mb-3 shadow-sm border-0">
        <div class="row g-0">
            @if($agenda->gambar)
            <div class="col-md-4">
                <img src="{{ Storage::url($agenda->gambar) }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $agenda->tema }}">
            </div>
            @endif
            <div class="col-md-{{ $agenda->gambar ? '8' : '12' }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color:#074174;">{{ $agenda->tema }}</h5>
                    <div class="mb-2 text-muted" style="font-size:13px;">
                        <span class="me-3"><i class="fas fa-map-marker-alt"></i> {{ $agenda->tempat }}</span>
                        <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($agenda->tgl_mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($agenda->tgl_selesai)->translatedFormat('d M Y') }}</span>
                    </div>
                    <p class="card-text">{!! Str::limit(strip_tags($agenda->isi_agenda), 150) !!}</p>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info">Belum ada agenda tersedia.</div>
    @endforelse

    {{ $agendas->links() }}
</div>
@endsection
