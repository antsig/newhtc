<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Album;
use App\Models\Agenda;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        // Get Breaking News (headline = 'Y')
        $breakingNews = \Illuminate\Support\Facades\Cache::remember('home_breakingNews', 3600, function() {
            return Berita::where('headline', 'Y')->latest('id_berita')->take(5)->get();
        });
        
        // Get Carousel News (Top 3 latest news)
        $carouselNews = \Illuminate\Support\Facades\Cache::remember('home_carouselNews', 3600, function() {
            return Berita::latest('id_berita')->take(3)->get();
        });
        
        // Get Latest News (Berita Terbaru)
        $beritaTerbaru = \Illuminate\Support\Facades\Cache::remember('home_beritaTerbaru', 3600, function() {
            return Berita::with('kategori')->latest('id_berita')->skip(3)->take(5)->get();
        });
        
        // Get Popular News (Berita Populer)
        $beritaPopuler = \Illuminate\Support\Facades\Cache::remember('home_beritaPopuler', 3600, function() {
            return Berita::orderBy('dibaca', 'desc')->take(5)->get();
        });
        
        // Get Latest Album/Photo
        $albumTerbaru = \Illuminate\Support\Facades\Cache::remember('home_albumTerbaru', 3600, function() {
            return Album::latest('id_album')->first();
        });
        
        // Get Latest Video
        $videoTerbaru = \Illuminate\Support\Facades\Cache::remember('home_videoTerbaru', 3600, function() {
            return \App\Models\Video::where('aktif', true)->latest('id')->first();
        });
        
        return view('welcome', compact(
            'breakingNews', 
            'carouselNews', 
            'beritaTerbaru', 
            'beritaPopuler', 
            'albumTerbaru',
            'videoTerbaru'
        ));
    }
}
