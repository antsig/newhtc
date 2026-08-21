<p align="center">
  <img src="public/favicon.ico" width="100" alt="HTC Logo">
</p>

<h1 align="center">HTC Pajak & Bisnis (New HTC)</h1>

<p align="center">
  Platform Edukasi dan Konsultasi Pajak, Bisnis, dan Keuangan Terpadu.
</p>

---

## 📖 Tentang Aplikasi

Aplikasi **New HTC (HTC Pajak)** adalah sebuah platform berbasis web yang menyediakan informasi berita, agenda, pelatihan, layanan, konsultasi, dan berbagai publikasi terkait dunia perpajakan, bisnis, hukum, dan keuangan. 

Sistem ini dulunya berbasis CMS lawas (PHPmu), yang kini telah **di-rebuild total secara modern** menggunakan:
- **Laravel 12** sebagai kerangka utama.
- **Filament v3** sebagai admin panel (TALL Stack).

## 🚀 Fitur Utama & Arsitektur Sistem

- **Sistem WebP Otomatis**: Semua foto yang diunggah ke website secara otomatis akan dikonversi, dikompresi, dan di-*resize* ke format `.webp` (menggunakan Intervention Image v4) agar website memuat gambar sangat cepat.
- **Migrasi Database Terkonsolidasi**: Seluruh file migrasi kotor (add/drop column) dari sejarah *development* telah digabungkan ke dalam 1 file inti *Schema Dump* (`database/schema/mysql-schema.sql`) sehingga proses *build* menjadi bersih dan ringan.
- **Auto-Seeder Aktual**: Seeder menggunakan data langsung dari *production/dashboard* (`database/seeders/data.sql`), menjamin jika ada reset, konten riil Anda akan kembali sempurna.
- **Admin Panel Premium**: 
  - Dashboard Filament dengan *Quick Actions* responsif (pintasan cepat ke modul penting).
  - Profil dan Navigasi Keluar (Logout) yang dipindahkan praktis ke *Topbar*.
  - *Default Sorting* Data tabel otomatis menampilkan item terbaru di urutan paling atas.
- **Frontend Publik**: Tampilan *Company Profile*, portal berita, video interaktif dari YouTube, layanan edukasi, dan galeri yang modern.

## 💻 Tech Stack

- **Framework Backend**: [Laravel 12](https://laravel.com)
- **Admin Panel**: [Filament v3](https://filamentphp.com) (Livewire 3, Tailwind CSS, Alpine.js)
- **Database**: MySQL / MariaDB (Schema Dump)
- **Image Processing**: Intervention Image v4 (GD Driver)
- **Frontend Publik**: Blade Template, Vanilla CSS/JS, Bootstrap

## 🛠 Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan Anda:

1. **Clone repository** (jika menggunakan git):
   ```bash
   git clone <repo-url> newhtc
   cd newhtc
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**:
   Salin `.env.example` menjadi `.env` dan atur koneksi database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Pastikan koneksi DB di `.env` disesuaikan (misal: `DB_DATABASE=htcnew`).

4. **Instalasi Struktur & Data (Otomatis)**:
   Karena menggunakan *Schema Dump*, Anda dapat me-reset dan mengembalikan data secara langsung dengan 1 perintah:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Perintah ini sangat aman, karena secara cerdas akan me-restore semua Berita, Gambar, Pengaturan yang terakhir direkam ke Seeder).*

5. **Symlink Storage**:
   Wajib dijalankan agar gambar/thumbnail webp dapat diakses publik:
   ```bash
   php artisan storage:link
   ```

6. **Jalankan Aplikasi**:
   ```bash
   php artisan serve
   ```
   - **Frontend**: `http://127.0.0.1:8000`
   - **Admin Panel**: `http://127.0.0.1:8000/admin`

## 👤 Akses Admin

Gunakan login utama berikut *(atau yang sesuai dengan data di sistem terakhir)*:
- **URL**: `/admin`
- **Email**: `admin@htcpajak.com` (atau email administrator Anda)
- **Password**: `password` (jika menggunakan *factory/seeder*)

## ✨ Riwayat Pembersihan Sistem (Legacy)

- Struktur folder `public/asset/foto_*` lawas telah dibersihkan sepenuhnya, digantikan oleh struktur `storage/app/public/...`.
- Seluruh *script dummy* dan *scratch-code* yang tercecer di *root directory* telah dihapus permanen.

---
<p align="center">
  <i>Dikembangkan untuk pengelolaan informasi terpadu HTC Pajak & Bisnis</i>
</p>
