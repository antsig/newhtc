@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Galeri Foto</h1>
    
    <div class="row g-4">
        @forelse($albums as $album)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                @if($album->gbr_album)
                <img src="{{ Storage::url($album->gbr_album) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $album->jdl_album }}">
                @else
                <img src="https://via.placeholder.com/300x200.png/eee/999?text=No+Cover" class="card-img-top object-fit-cover" style="height: 200px;" alt="No Cover">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold" style="font-size:16px;">{{ $album->jdl_album }}</h5>
                    <!-- Button trigger modal for Multiple Photos -->
                    <button type="button" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#albumModal{{ $album->id_album }}">
                        Lihat Foto
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="albumModal{{ $album->id_album }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $album->jdl_album }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $album->keterangan }}</p>
                        @if(!empty($album->photos) && is_array($album->photos))
                            <div class="row g-2">
                                @foreach($album->photos as $photo)
                                    <div class="col-md-4">
                                        <img src="{{ Storage::url($photo) }}" class="img-fluid rounded" alt="Photo">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">Tidak ada foto lain dalam album ini.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada album foto.</p>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $albums->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
