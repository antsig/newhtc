@php
    $identitas = \Illuminate\Support\Facades\Cache::remember('admin_identitas', 3600, function() {
        return \App\Models\Identitas::first();
    });
@endphp
<div style="display: flex; align-items: center; gap: 10px;">
    @if($identitas && $identitas->logo)
        <img src="{{ asset('storage/' . $identitas->logo) }}" alt="Logo" style="height: 32px; width: auto; object-fit: contain;">
    @endif
    <span style="font-weight: 700; font-size: 1.1rem; color: #ffffff; letter-spacing: 0.5px;">{{ $identitas->nama_website ?? 'HTC Pajak' }}</span>
</div>
