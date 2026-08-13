# Rencana Implementasi Fitur Lanjutan

Permintaan Anda mencakup banyak fitur krusial yang akan sangat meningkatkan fungsionalitas dan kenyamanan sistem. Karena ini adalah perubahan besar (mencakup *database* dan *layout*), berikut adalah rencana kerjanya:

## 1. Migrasi Data dari Project Lama (htcpajak)
- Saya akan membuat script migrasi (Seeder) khusus yang akan membaca file database lama Anda (`pusatpel_pajak.sql`) dan menarik data untuk halaman statis seperti: **Profil, Visi Misi, Legalitas, Direksi, Layanan, dan Program Pelatihan**.
- Data ini akan dimasukkan ke tabel `halamanstatis` di Laravel secara otomatis.

## 2. Pemisahan Galeri Foto & Video
- **Galeri Video:** Saya akan membuat tabel/model `Video` khusus. Di admin, Anda hanya perlu memasukkan link/URL YouTube, dan sistem akan otomatis menampilkannya.
- **Galeri Foto (Sistem Album):** Tabel `album` yang ada saat ini hanya mendukung 1 foto per album (sebagai cover). Saya akan menambahkan kolom khusus agar Anda bisa mengunggah **banyak foto sekaligus (Multiple Upload)** ke dalam satu album.

## 3. Media & Editor (Summernote / Trix)
- **Editor Berita/Layanan:** Filament sudah dilengkapi dengan *RichEditor* modern bawaan yang jauh lebih baik (dan aman) dibanding Summernote klasik. Saya akan mengonfigurasi editor ini agar Anda bisa langsung melakukan *drag & drop* atau *upload* foto ke tengah-tengah teks artikel.
- **Media Tambahan:** Form berita akan dipertegas untuk form Upload Cover Foto dan input Link Video YouTube.

## 4. Perombakan Menu Pengaturan (Identitas)
- Saat ini menu Identitas masih berbentuk Tabel (harus klik Edit dulu).
- Sesuai permintaan, saya akan mengubahnya menjadi **Single Page Form (Halaman Pengaturan Tunggal)**. Begitu menu "Identitas" diklik, Anda akan langsung melihat form isian tanpa perlu masuk ke mode tabel.

## 5. Pembuatan Halaman Publik (Tugas Sebelumnya)
- Saya akan membuat halaman detail untuk Berita (`/berita/{slug}`), Detail Kategori (`/kategori/{slug}`), Detail Halaman Statis (`/halaman/{slug}`), serta Halaman Galeri & Video.
- *Catatan:* Sesuai rekomendasi, saya akan menghilangkan sidebar kiri khusus di halaman *membaca detail* agar teks lebih lebar dan nyaman.

## Open Questions

> [!IMPORTANT]
> Untuk **Galeri Video**, apakah Anda ingin videonya berbentuk *pop-up* (saat diklik membesar), atau langsung diputar (*embed*) di dalam halaman web?
> *(Saran saya: Langsung Embed agar pengunjung tidak perlu keluar dari halaman).*

Jika rencana ini sudah sesuai dengan ekspektasi Anda, mohon persetujuannya agar saya bisa langsung menulis kode untuk semua fitur di atas!
