# Changelog & Versioning History

Dokumen ini mencatat seluruh riwayat pembaruan sistem **New HTC (HTC Pajak)** dari versi *legacy* (PHPmu) hingga menjadi sistem modern berbasis Laravel 12.

## [v2.0.0] - Modernisasi Total (Laravel 12 & Filament v3)
**Fase Rebuild & Refactoring**
- **Framework Upgrade**: Sistem di-upgrade dari CMS lama menjadi **Laravel 12.67.0**.
- **Admin Panel Baru**: Implementasi **Filament v3** (TALL Stack: Tailwind, Alpine, Livewire, Laravel) menggantikan dashboard admin lama.
- **Konsolidasi Migrasi**: Pembersihan puluhan file migrasi "kotor" bawaan sejarah pengembangan menjadi satu skema rapi melalui `mysql-schema.sql`.
- **Auto-Seeder (Data.sql)**: Integrasi data riil production ke dalam proses *seed*, memungkinkan `migrate:fresh --seed` memulihkan data aktual tanpa kehilangan artikel maupun konfigurasi.
- **Image Processing (WebP)**: Sistem otomatis (Trait `ConvertsImagesToWebp`) menggunakan Intervention Image v4 untuk mengonversi setiap foto/logo yang diunggah menjadi format `.webp`, menghasilkan performa *load* yang super ringan.
- **Pembersihan Root & Asset**: Menghapus direktori `public/asset/foto_*` lawas, memindahkan semuanya ke standar Laravel (`storage/app/public/`). Menghapus seluruh file eksperimen di direktori *root*.

## [v1.5.0] - UI & UX Enhancements
**Fase Pembaruan Tampilan Publik & Admin**
- **Widget & Quick Actions**: Penambahan *shortcut* interaktif di beranda admin.
- **Navigasi Profil**: Memindahkan akses profil dan *logout* ke *topbar* (Header) Filament untuk mempermudah akses.
- **Auto-sorting Tabel**: Memastikan seluruh tabel data di Filament (Berita, Agenda, Kategori, Video, dsb.) secara *default* menampilkan data terbaru di urutan teratas.

## [v1.0.0] - Legacy System (PHPmu)
**Versi Pendahulu**
- Menggunakan struktur folder lawas (`public/asset/`).
- Pengelolaan database manual dan rentan konflik pada migrasi.
- CMS berbasis procedural / framework versi lama yang belum mengadopsi standar TALL Stack.

---
*Catatan: Segala pengembangan selanjutnya wajib mengikuti konvensi TALL Stack dan didokumentasikan di folder ini.*
