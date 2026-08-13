<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\HalamanStatis;
use App\Models\Album;
use App\Models\Video;
use Illuminate\Support\Facades\View;
use App\Models\Identitas;
use App\Models\Menu;

class PublicController extends Controller
{
    public function __construct()
    {
        // Share common data to all views
        $identitas = Identitas::first();
        $menus = Menu::where('aktif', 'Ya')->orderBy('urutan', 'ASC')->get();
        View::share('identitas', $identitas);
        View::share('menus', $menus);
    }

    public function beritaIndex()
    {
        $berita = Berita::where('status', 'Y')->orderBy('id_berita', 'DESC')->paginate(10);
        return view('berita.index', compact('berita'));
    }

    public function profilIndex()
    {
        // Try to find the exact halaman profil if exists, or show a list
        $halaman = HalamanStatis::where('judul_seo', 'tentang-htc--training-and-consulting')->first();
        if($halaman) {
            return view('halaman.detail', compact('halaman'));
        }
        return abort(404, 'Halaman profil belum dibuat');
    }

    public function layananIndex()
    {
        $layanans = HalamanStatis::where('judul_seo', 'like', '%layanan%')->get();
        return view('halaman.layanan', compact('layanans'));
    }

    public function kontakIndex()
    {
        return view('kontak.index');
    }

    public function agendaIndex()
    {
        // For now, return a placeholder view
        return view('halaman.agenda');
    }

    public function galeriDownload()
    {
        // For now, return a placeholder view
        return view('galeri.download');
    }

    public function pelatihanDetail($slug)
    {
        // Placeholder view since we don't have a Pelatihan module yet
        return view('halaman.pelatihan', compact('slug'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('judul_seo', $slug)->firstOrFail();
        // Update view count
        $berita->increment('dibaca');
        
        $beritaTerkait = Berita::where('id_kategori', $berita->id_kategori)
                                ->where('id_berita', '!=', $berita->id_berita)
                                ->orderBy('id_berita', 'DESC')
                                ->take(5)->get();

        return view('berita.detail', compact('berita', 'beritaTerkait'));
    }

    public function kategoriDetail($slug)
    {
        $kategori = Kategori::where('kategori_seo', $slug)->firstOrFail();
        $berita = Berita::where('id_kategori', $kategori->id_kategori)
                        ->where('status', 'Y')
                        ->orderBy('id_berita', 'DESC')
                        ->paginate(10);
                        
        return view('berita.kategori', compact('kategori', 'berita'));
    }

    public function halamanDetail($slug)
    {
        $halaman = HalamanStatis::where('judul_seo', $slug)->firstOrFail();
        $halaman->increment('dibaca');
        
        return view('halaman.detail', compact('halaman'));
    }

    public function galeriFoto()
    {
        $albums = Album::where('aktif', 'Y')->orderBy('id_album', 'DESC')->paginate(12);
        return view('galeri.foto', compact('albums'));
    }

    public function galeriVideo()
    {
        $videos = Video::where('aktif', true)->orderBy('id', 'DESC')->paginate(12);
        return view('galeri.video', compact('videos'));
    }
}
