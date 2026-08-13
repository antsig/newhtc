<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        // 1. Identitas Website
        DB::table('identitas')->truncate();
        DB::table('identitas')->insert([
            'nama_website' => 'HTC Training & Consulting',
            'email' => 'info@htcpajak.com',
            'url' => 'http://localhost:8000',
            'facebook' => 'https://facebook.com/htcpajak',
            'rekening' => 'BCA 123456789 a.n HTC',
            'no_telp' => '0274-2885536',
            'meta_deskripsi' => 'Lembaga Konsultasi dan Pelatihan Perpajakan',
            'meta_keyword' => 'pajak, konsultasi, training',
            'favicon' => '',
            'maps' => 'Yogyakarta',
        ]);

        // 2. Kategori
        DB::table('kategori')->truncate();
        $katNasionalId = DB::table('kategori')->insertGetId([
            'nama_kategori' => 'Nasional',
            'kategori_seo' => 'nasional',
            'aktif' => 'Y',
            'username' => 'admin',
        ]);
        
        $katDaerahId = DB::table('kategori')->insertGetId([
            'nama_kategori' => 'Daerah',
            'kategori_seo' => 'daerah',
            'aktif' => 'Y',
            'username' => 'admin',
        ]);

        // 3. Berita
        DB::table('berita')->truncate();
        $beritaData = [
            [
                'id_kategori' => $katNasionalId,
                'username' => 'admin',
                'judul' => 'PT. AKUNTAN BANGUN BHUANA JALIN KERJASAMA DENGAN JURNAL.ID',
                'judul_seo' => Str::slug('PT. AKUNTAN BANGUN BHUANA JALIN KERJASAMA DENGAN JURNAL.ID'),
                'headline' => 'Y',
                'aktif' => 'Y',
                'utama' => 'Y',
                'isi_berita' => '<p>Yogyakarta – PT. Akuntan Bangun Bhuana menjalin kerjasama dengan Jurnal.id, aplikasi akuntansi online...</p>',
                'hari' => 'Selasa',
                'tanggal' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'jam' => '09:25:31',
                'dibaca' => 125,
                'status' => 'Y',
            ],
            [
                'id_kategori' => $katDaerahId,
                'username' => 'admin',
                'judul' => 'Webinar Diskusi Aktual Pajak LKBH FH UII',
                'judul_seo' => Str::slug('Webinar Diskusi Aktual Pajak LKBH FH UII'),
                'headline' => 'Y',
                'aktif' => 'Y',
                'utama' => 'Y',
                'isi_berita' => '<p>Lembaga Konsultasi dan Bantuan Hukum Fakultas Hukum Universitas Islam Indonesia mengadakan diskusi aktual...</p>',
                'hari' => 'Senin',
                'tanggal' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'jam' => '10:15:00',
                'dibaca' => 85,
                'status' => 'Y',
            ],
            [
                'id_kategori' => $katDaerahId,
                'username' => 'admin',
                'judul' => 'HTC Training & Consulting Menggelar Pelatihan Komputer Pajak Bersama SMK NEGERI 1 TEMPEL',
                'judul_seo' => Str::slug('HTC Training & Consulting Menggelar Pelatihan Komputer Pajak Bersama SMK NEGERI 1 TEMPEL'),
                'headline' => 'Y',
                'aktif' => 'Y',
                'utama' => 'Y',
                'isi_berita' => '<p>Sleman – SMK Negeri 1 Tempel berterima kasih kepada HTC Training & Consulting yang telah bekerja sama menggelar kegiatan Pelatihan Komputer Pajak...</p>',
                'hari' => 'Rabu',
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jam' => '10:40:43',
                'dibaca' => 200,
                'status' => 'Y',
            ],
            [
                'id_kategori' => $katNasionalId,
                'username' => 'admin',
                'judul' => 'Sosialisasi Kelas Industri SMK Muhammadiyah Kota Magelang',
                'judul_seo' => Str::slug('Sosialisasi Kelas Industri SMK Muhammadiyah Kota Magelang'),
                'headline' => 'Y',
                'aktif' => 'Y',
                'utama' => 'Y',
                'isi_berita' => '<p>PT. Akuntan Bangun Bhuana bersama SMK Muhammadiyah Kota Magelang resmi membuka kelas industri di bidang Perpajakan...</p>',
                'hari' => 'Kamis',
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jam' => '14:06:33',
                'dibaca' => 150,
                'status' => 'Y',
            ]
        ];
        DB::table('berita')->insert($beritaData);

        // 4. Album
        DB::table('album')->truncate();
        DB::table('album')->insert([
            'jdl_album' => 'Tenaga Perpajakan',
            'album_seo' => 'tenaga-perpajakan',
            'keterangan' => 'Dokumentasi Tenaga Perpajakan',
            'gbr_album' => '',
            'aktif' => 'Y',
            'hits_album' => 0,
            'hari' => 'Kamis',
            'tgl_posting' => Carbon::now()->format('Y-m-d'),
            'jam' => '10:00:00',
            'username' => 'admin'
        ]);

        // 5. Menu
        DB::table('menu')->truncate();
        
        // Insert parent menus and get IDs
        $idProfil = DB::table('menu')->insertGetId(['id_parent' => 0, 'nama_menu' => 'Profil', 'link' => '#', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $idPelatihan = DB::table('menu')->insertGetId(['id_parent' => 0, 'nama_menu' => 'Pelatihan', 'link' => '#', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $idGaleri = DB::table('menu')->insertGetId(['id_parent' => 0, 'nama_menu' => 'Galeri', 'link' => '#', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        $menus = [
            ['id_parent' => 0, 'nama_menu' => 'Home', 'link' => '/', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 1],
            
            // Submenu Profil
            ['id_parent' => $idProfil, 'nama_menu' => 'Sejarah', 'link' => '/halaman/sejarah', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 1],
            ['id_parent' => $idProfil, 'nama_menu' => 'Visi Misi', 'link' => '/halaman/visi-misi', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 2],
            ['id_parent' => $idProfil, 'nama_menu' => 'Legalitas', 'link' => '/halaman/legalitas', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 3],
            ['id_parent' => $idProfil, 'nama_menu' => 'Tim', 'link' => '/halaman/tim', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 4],
            
            // Submenu Pelatihan
            ['id_parent' => $idPelatihan, 'nama_menu' => 'Perpajakan', 'link' => '/pelatihan/perpajakan', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 1],
            ['id_parent' => $idPelatihan, 'nama_menu' => 'Akuntansi', 'link' => '/pelatihan/akuntansi', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 2],
            ['id_parent' => $idPelatihan, 'nama_menu' => 'Manajemen', 'link' => '/pelatihan/manajemen', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 3],
            
            // Other Top Menus
            ['id_parent' => 0, 'nama_menu' => 'Layanan', 'link' => '/layanan', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 4],
            ['id_parent' => 0, 'nama_menu' => 'Berita', 'link' => '/berita', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 5],
            ['id_parent' => 0, 'nama_menu' => 'Agenda', 'link' => '/agenda', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 6],
            
            // Submenu Galeri
            ['id_parent' => $idGaleri, 'nama_menu' => 'Foto', 'link' => '/galeri/foto', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 1],
            ['id_parent' => $idGaleri, 'nama_menu' => 'Video', 'link' => '/galeri/video', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 2],
            ['id_parent' => $idGaleri, 'nama_menu' => 'Download', 'link' => '/galeri/download', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 3],
            
            ['id_parent' => 0, 'nama_menu' => 'Kontak', 'link' => '/kontak', 'aktif' => 'Ya', 'position' => 'Top', 'urutan' => 8],
        ];
        
        foreach($menus as &$menu) {
            $menu['created_at'] = Carbon::now();
            $menu['updated_at'] = Carbon::now();
        }
        
        DB::table('menu')->insert($menus);

        // 6. Halaman Statis
        DB::table('halamanstatis')->truncate();
        DB::table('halamanstatis')->insert([
            [
                'judul' => 'Tentang HTC Training and Consulting',
                'judul_seo' => 'tentang-htc--training-and-consulting',
                'isi_halaman' => '<p>HTC Training & Consulting adalah lembaga pelatihan perpajakan...</p>',
                'tgl_posting' => Carbon::now()->format('Y-m-d'),
                'gambar' => '',
                'username' => 'admin',
                'dibaca' => 50,
                'jam' => '10:00:00',
                'hari' => 'Senin'
            ],
            [
                'judul' => 'Layanan Konsultasi Pajak',
                'judul_seo' => 'layanan-konsultasi-pajak',
                'isi_halaman' => '<p>Kami melayani konsultasi pajak untuk perusahaan dan perorangan.</p>',
                'tgl_posting' => Carbon::now()->format('Y-m-d'),
                'gambar' => '',
                'username' => 'admin',
                'dibaca' => 40,
                'jam' => '11:00:00',
                'hari' => 'Selasa'
            ]
        ]);

        // 7. Videos
        DB::table('videos')->truncate();
        DB::table('videos')->insert([
            [
                'judul' => 'Registrasi Akun DJP Online',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'keterangan' => 'Video tutorial registrasi DJP online',
                'aktif' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
