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
        $breakingNews = Berita::where('headline', 'Y')->latest('id_berita')->take(5)->get();
        
        // Get Carousel News (Top 3 latest news)
        $carouselNews = Berita::latest('id_berita')->take(3)->get();
        
        // Get Latest News (Berita Terbaru)
        $beritaTerbaru = Berita::with('kategori')->latest('id_berita')->skip(3)->take(5)->get();
        
        // Get Popular News (Berita Populer)
        $beritaPopuler = Berita::orderBy('dibaca', 'desc')->take(5)->get();
        
        // Get Latest Album/Photo
        $albumTerbaru = Album::latest('id_album')->first();
        
        // Get Latest Video
        $videoTerbaru = \App\Models\Video::where('aktif', true)->latest('id')->first();
        
        // Get Menus (if any)
        $menus = Menu::where('aktif', 'Ya')->orderBy('urutan', 'asc')->get();
        
        return view('welcome', compact(
            'breakingNews', 
            'carouselNews', 
            'beritaTerbaru', 
            'beritaPopuler', 
            'albumTerbaru',
            'videoTerbaru', 
            'menus'
        ));
    }
}
