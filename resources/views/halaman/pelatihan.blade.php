@extends('layouts.app')

@section('title', 'Kategori Pelatihan: ' . ucfirst(str_replace('-', ' ', $slug)))

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Pelatihan: {{ ucfirst(str_replace('-', ' ', $slug)) }}</h1>
    
    <div class="alert alert-info">
        Menampilkan daftar pelatihan untuk kategori {{ ucfirst(str_replace('-', ' ', $slug)) }} (modul dalam pengembangan).
    </div>
</div>
@endsection
