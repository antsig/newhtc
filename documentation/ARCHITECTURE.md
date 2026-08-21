# Arsitektur Sistem New HTC

Sistem New HTC dibangun menggunakan teknologi terkini di ekosistem PHP dengan mengedepankan performa, keamanan, dan kemudahan _maintenance_.

## 1. Teknologi Inti (TALL Stack)
* **Tailwind CSS**: Digunakan oleh Filament untuk _styling_ UI Admin.
* **Alpine.js**: Mengatur interaktivitas _frontend_ panel admin tanpa memerlukan jQuery.
* **Livewire 3**: Memungkinkan pembuatan UI reaktif secara dinamis dengan menggunakan komponen PHP.
* **Laravel 12**: Bertindak sebagai kerangka kerja _backend_, mengatur _routing_, komunikasi dengan _database_ (Eloquent ORM), keamanan otentikasi, dan berbagai fitur esensial.

## 2. Struktur Modul Admin (Filament v3)
Seluruh pengelolaan tabel kini terpusat di `app/Filament/Resources/`. Setiap modul dipecah menjadi:
* **Resource Class** (`*Resource.php`): Mengatur ikon, label, dan rute keseluruhan modul.
* **Pages** (`Pages/List*, Create*, Edit*`): Mengontrol halaman spesifik dan aksi yang tersedia.
* **Schemas** (`Schemas/*Form.php`): Memisahkan logika konfigurasi tata letak _form input_ agar kode lebih terstruktur.
* **Tables** (`Tables/*Table.php`): Memisahkan konfigurasi kolom, filter, dan aksi tabel data. Semua tabel dilengkapi dengan `->defaultSort('created_at', 'desc')` (atau ID jika tidak ada `created_at`).

## 3. Optimasi Aset & Gambar (Trait ConvertsImagesToWebp)
Untuk mencegah ukuran gambar memberatkan kecepatan pemuatan halaman:
1. Saat admin mengunggah gambar melalui Filament, _file_ akan disimpan sementara.
2. Melalui **Eloquent Event** (pada proses `creating` dan `updating`), Trait `ConvertsImagesToWebp` (berbasis Intervention Image v4) akan mengintersepsi proses tersebut.
3. Gambar diubah rasio skalanya (_resize_ maksimal lebar 1200px), dikonversi ke format `.webp`, dan dikompresi (kualitas 80%).
4. Gambar orisinil yang lama (beserta ekstensi lawasnya) akan dihapus secara otomatis untuk menghemat ruang penyimpanan server.

## 4. Manajemen Migrasi & Database
Untuk menghindari konflik skema (_schema conflict_) akibat penambahan atau pengurangan kolom di pertengahan _development_, sistem menggunakan:
* **Schema Dump** (`database/schema/mysql-schema.sql`): Berisi seluruh definisi tabel dalam bentuk _raw SQL_ yang langsung bisa digunakan Laravel saat proses inisialisasi. Ini menggantikan file-file migrasi tradisional yang kotor.
* **Data Seeder** (`database/seeders/data.sql`): Daripada menggunakan _factory dummy_, seeder kita melakukan pemanggilan ke skrip data SQL aktual sehingga konten riil yang sudah diketik di _dashboard_ admin tidak pernah hilang meski terjadi proses `migrate:fresh`.
