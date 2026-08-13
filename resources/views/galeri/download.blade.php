@extends('layouts.app')

@section('title', 'Download Area')

@section('right-sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<div class="bg-white border p-4 mb-4">
    <h1 class="fw-bold mb-4" style="color:#074174; border-bottom:2px solid #eee; padding-bottom:10px;">Download Area</h1>
    
    <div class="alert alert-info">
        Belum ada berkas yang dapat diunduh.
    </div>
</div>
@endsection
