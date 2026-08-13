@extends('layouts.app')

@section('title', 'Download Area')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Download Area</h1>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead style="background-color:#074174; color:white;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Berkas</th>
                    <th scope="col">Diunduh</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($downloads as $index => $dl)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $dl->judul }}</td>
                    <td>{{ $dl->hits_download }}x</td>
                    <td class="text-center">
                        <a href="{{ Storage::url($dl->file) }}" class="btn btn-sm btn-primary" download target="_blank"><i class="fas fa-download"></i> Unduh</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada berkas yang dapat diunduh.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $downloads->links() }}
</div>
@endsection
