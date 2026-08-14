<div class="sidebar-widget bg-white border p-3 mb-4">
    <h5 class="fw-bold mb-3" style="color: #074174; border-bottom: 2px solid #eee; padding-bottom: 10px;">Cari</h5>
    <form action="{{ url('/berita') }}" method="GET" class="d-flex">
        <input type="text" name="q" class="form-control rounded-0" placeholder="Ketik kata kunci..." value="{{ request('q') }}">
        <button class="btn btn-primary rounded-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

@php
    $sidebarBerita = \App\Models\Berita::where('status', 'Y')->orderBy('dibaca', 'desc')->take(5)->get();
@endphp

<div class="sidebar-widget bg-white border p-3 mb-4">
    <h5 class="fw-bold mb-3" style="color: #074174; border-bottom: 2px solid #eee; padding-bottom: 10px;">Berita Populer</h5>
    <ul class="list-unstyled mb-0">
        @foreach($sidebarBerita as $sb)
        <li class="mb-3 d-flex">
            @if($sb->gambar)
            <img src="{{ Storage::url($sb->gambar) }}" class="me-3 rounded object-fit-cover" style="width: 70px; height: 70px;" alt="{{ $sb->judul }}">
            @else
            <img src="{{ asset('images/no-image.png') }}" class="me-3 rounded" style="width: 70px; height: 70px;" alt="No Image">
            @endif
            <div>
                <a href="{{ url('berita/'.$sb->judul_seo) }}" class="text-decoration-none text-dark fw-bold" style="font-size: 14px; line-height: 1.4; display: block; margin-bottom: 5px;">{{ Str::limit($sb->judul, 45) }}</a>
                <small class="text-muted" style="font-size: 12px;"><i class="far fa-eye"></i> {{ $sb->dibaca }}x dibaca</small>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<div class="sidebar-widget bg-white border p-3">
    <h5 class="fw-bold mb-3" style="color: #074174; border-bottom: 2px solid #eee; padding-bottom: 10px;">Pelatihan</h5>
    <ul class="list-unstyled mb-0" style="font-size: 14px;">
        <li class="mb-2"><i class="fas fa-angle-right text-primary me-2"></i> <a href="{{ url('/pelatihan/perpajakan') }}" class="text-decoration-none text-dark">Perpajakan</a></li>
        <li class="mb-2"><i class="fas fa-angle-right text-primary me-2"></i> <a href="{{ url('/pelatihan/akuntansi') }}" class="text-decoration-none text-dark">Akuntansi</a></li>
        <li class="mb-2"><i class="fas fa-angle-right text-primary me-2"></i> <a href="{{ url('/pelatihan/manajemen') }}" class="text-decoration-none text-dark">Manajemen</a></li>
    </ul>
</div>
