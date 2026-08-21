-- Seed data for users
TRUNCATE TABLE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Test User', 'test@example.com', '2026-08-13 16:34:34', '$2y$12$kZ4u9nco4xZjlNfLa505nOfyOmhTuKdJXT3XSj1JwWLpbGnbzlz6C', 'On6VMJ9b6K', '2026-08-13 16:34:34', '2026-08-13 16:34:34');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('2', 'Admin', 'admin@example.com', NULL, '$2y$12$jnqzadoGS2zRbYz3clxRVOSjmvrO5qEHe3rNyWHdJJuiHJD1KaoQG', NULL, '2026-08-13 17:06:25', '2026-08-13 17:06:25');

-- Seed data for kategori
TRUNCATE TABLE `kategori`;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `username`, `aktif`, `sidebar`, `gambar_utama`, `created_at`, `updated_at`) VALUES ('1', 'Nasional', 'nasional', 'admin', 'Y', NULL, NULL, NULL, NULL);
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `username`, `aktif`, `sidebar`, `gambar_utama`, `created_at`, `updated_at`) VALUES ('2', 'Daerah', 'daerah', 'admin', 'Y', NULL, NULL, NULL, NULL);

-- Seed data for berita
TRUNCATE TABLE `berita`;
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `created_at`, `updated_at`) VALUES ('2', '2', 'admin', 'Webinar Diskusi Aktual Pajak LKBH FH UII', NULL, NULL, 'webinar-diskusi-aktual-pajak-lkbh-fh-uii', 'Y', 'Y', 'Y', '<p>Lembaga Konsultasi dan Bantuan Hukum Fakultas Hukum Universitas Islam Indonesia mengadakan diskusi aktual...</p>', NULL, 'Senin', '2026-08-12', '10:15:00', NULL, '85', NULL, 'Y', NULL, NULL);
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `created_at`, `updated_at`) VALUES ('3', '2', 'admin', 'HTC Training & Consulting Menggelar Pelatihan Komputer Pajak Bersama SMK NEGERI 1 TEMPEL', NULL, NULL, 'htc-training-consulting-menggelar-pelatihan-komputer-pajak-bersama-smk-negeri-1-tempel', 'Y', 'Y', 'Y', '<p>Sleman – SMK Negeri 1 Tempel berterima kasih kepada HTC Training & Consulting yang telah bekerja sama menggelar kegiatan Pelatihan Komputer Pajak...</p>', NULL, 'Rabu', '2026-08-13', '10:40:43', NULL, '200', NULL, 'Y', NULL, NULL);
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `created_at`, `updated_at`) VALUES ('4', '1', 'admin', 'Sosialisasi Kelas Industri SMK Muhammadiyah Kota Magelang', NULL, NULL, 'sosialisasi-kelas-industri-smk-muhammadiyah-kota-magelang', 'Y', 'Y', 'Y', '<p>PT. Akuntan Bangun Bhuana bersama SMK Muhammadiyah Kota Magelang resmi membuka kelas industri di bidang Perpajakan...</p>', NULL, 'Kamis', '2026-08-13', '14:06:33', 'identitas/01KZZCJ95TED9FNS9ZE9NBBEE7.webp', '150', NULL, 'Y', NULL, '2026-08-21 02:08:12');

-- Seed data for halamanstatis
TRUNCATE TABLE `halamanstatis`;
INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`, `created_at`, `updated_at`) VALUES ('1', 'sejarah', 'sejarah', '<p>HTC Training &amp; Consulting adalah lembaga pelatihan perpajakan...</p>', '2026-08-13', NULL, 'admin', '50', '10:00:00', 'Senin', NULL, '2026-08-14 02:41:14');
INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`, `created_at`, `updated_at`) VALUES ('2', 'Layanan Konsultasi Pajak', 'layanan-konsultasi-pajak', '<p>Kami melayani konsultasi pajak untuk perusahaan dan perorangan.</p>', '2026-08-13', '', 'admin', '40', '11:00:00', 'Selasa', NULL, NULL);
INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`, `created_at`, `updated_at`) VALUES ('3', 'visi misi', 'visi-misi', '<p>visi misi</p>', '2026-08-13', NULL, 'admin@example.com', '1', '21:07:51', 'Kamis', '2026-08-13 21:08:09', '2026-08-13 21:08:48');

-- Seed data for agenda
TRUNCATE TABLE `agenda`;
INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `gambar`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `dibaca`, `username`, `created_at`, `updated_at`) VALUES ('1', 'Gerak Jalan Hari Kemerdekaan', 'gerak-jalan-hari-kemerdekaan', '<p>Penyelenggaraan Gerak Jalan dalam rangka peringatan HUT Kemerdekaan</p>', 'Lapangan Taruna Remaja', 'Dikpora', 'agenda/01M01H3KEPR94J5XJRYDQCDXHK.png', '2026-08-17', '2026-08-18', '2026-08-15', '08:50:00', '0', 'admin', '2026-08-15 01:38:13', '2026-08-15 01:38:13');

-- Seed data for album
TRUNCATE TABLE `album`;
INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `photos`, `aktif`, `hits_album`, `tgl_posting`, `jam`, `hari`, `username`, `created_at`, `updated_at`) VALUES ('1', 'Tenaga Perpajakan', 'tenaga-perpajakan', 'Dokumentasi Tenaga Perpajakan', 'albums/covers/01KZYGDCEHXEFBFZHRHSCM75C9.jpg', '[\"albums/photos/01KZYGE393RP4CGZPJGYYC3CYV.png\", \"albums/photos/01KZYGE3988EMQBXBN7CK68Y9H.jpg\"]', 'Y', '0', '2026-08-13', '10:00:00', 'Kamis', 'admin', NULL, '2026-08-13 21:28:45');

-- Seed data for identitas
TRUNCATE TABLE `identitas`;
INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `sosmed`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `logo`, `maps`, `created_at`, `updated_at`, `sejarah`, `visi_misi`, `legalitas`, `tim`) VALUES ('1', 'HTC Training & Consulting', 'info@htcpajak.com', 'http://localhost:8000', 'https://facebook.com/htcpajak', '[{\"url\": \"https://www.linkedin.com/in/underfighter/\", \"name\": \"LinkedIn\"}]', 'BCA 123456789 a.n HTC', '0274-2885536', 'Lembaga Konsultasi dan Pelatihan Perpajakan', 'pajak, konsultasi, training', 'identitas/01KZZCJ95TED9FNS9ZE9NBBEE7.jpg', 'identitas/01KZZCJ95HS2J4YM2XK9K8AXHG.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.96295424703!2d110.36313277404969!3d-7.793747177350343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5825fa6106c5%3A0x3ea4c521a5ed1133!2sJl.%20Malioboro%2C%20Sosromenduran%2C%20Gedong%20Tengen%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sen!2sid!4v1786721513699!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\"></iframe>', NULL, '2026-08-14 15:33:11', NULL, NULL, NULL, NULL);

-- Seed data for menu
TRUNCATE TABLE `menu`;
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('1', '0', 'Profil', '#', 'Ya', 'Top', '2', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('2', '0', 'Pelatihan', '#', 'Ya', 'Top', '3', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('3', '0', 'Galeri', '#', 'Ya', 'Top', '7', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('4', '0', 'Home', '/', 'Ya', 'Top', '1', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('5', '1', 'Sejarah', '/halaman/sejarah', 'Ya', 'Top', '1', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('6', '1', 'Visi Misi', '/halaman/visi-misi', 'Ya', 'Top', '2', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('7', '1', 'Legalitas', '/halaman/legalitas', 'Ya', 'Top', '3', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('8', '1', 'Tim', '/halaman/tim', 'Ya', 'Top', '4', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('9', '2', 'Perpajakan', '/pelatihan/perpajakan', 'Ya', 'Top', '1', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('10', '2', 'Akuntansi', '/pelatihan/akuntansi', 'Ya', 'Top', '2', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('11', '2', 'Manajemen', '/pelatihan/manajemen', 'Ya', 'Top', '3', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('12', '0', 'Layanan', '/layanan', 'Ya', 'Top', '4', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('13', '0', 'Berita', '/berita', 'Ya', 'Top', '5', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('14', '0', 'Agenda', '/agenda', 'Ya', 'Top', '6', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('15', '3', 'Foto', '/galeri/foto', 'Ya', 'Top', '1', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('16', '3', 'Video', '/galeri/video', 'Ya', 'Top', '2', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('17', '3', 'Download', '/galeri/download', 'Ya', 'Top', '3', '2026-08-13 20:13:19', '2026-08-13 20:13:19');
INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `created_at`, `updated_at`) VALUES ('18', '0', 'Kontak', '/kontak', 'Ya', 'Top', '8', '2026-08-13 20:13:19', '2026-08-13 20:13:19');

-- Seed data for videos
TRUNCATE TABLE `videos`;
INSERT INTO `videos` (`id`, `judul`, `youtube_url`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES ('1', 'Registrasi Akun DJP Online', 'https://www.youtube.com/watch?v=c9WNQsKPGow', 'Video tutorial registrasi DJP online', '1', '2026-08-13 20:13:19', '2026-08-14 15:35:04');

