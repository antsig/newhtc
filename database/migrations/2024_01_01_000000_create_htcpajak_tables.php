<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori');
            $table->string('kategori_seo');
            $table->string('username');
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->string('sidebar')->nullable();
            $table->string('gambar_utama')->nullable();
            $table->timestamps();
        });

        // 2. Tag
        Schema::create('tag', function (Blueprint $table) {
            $table->id('id_tag');
            $table->string('nama_tag');
            $table->string('tag_seo');
            $table->string('username');
            $table->integer('count')->default(0);
            $table->timestamps();
        });

        // 3. Berita
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->unsignedBigInteger('id_kategori');
            $table->string('username');
            $table->string('judul');
            $table->string('sub_judul')->nullable();
            $table->string('youtube')->nullable();
            $table->string('judul_seo');
            $table->enum('headline', ['Y', 'N'])->default('Y');
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->enum('utama', ['Y', 'N'])->default('Y');
            $table->longText('isi_berita');
            $table->text('keterangan_gambar')->nullable();
            $table->string('hari');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('gambar')->nullable();
            $table->integer('dibaca')->default(0);
            $table->string('tag')->nullable();
            $table->enum('status', ['Y', 'N'])->default('Y');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });

        // 4. Komentar
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->unsignedBigInteger('id_berita');
            $table->string('nama_komentar');
            $table->string('url')->nullable();
            $table->text('isi_komentar');
            $table->date('tgl');
            $table->time('jam_komentar');
            $table->enum('aktif', ['Y', 'N'])->default('N');
            $table->string('email');
            $table->timestamps();

            $table->foreign('id_berita')->references('id_berita')->on('berita')->onDelete('cascade');
        });

        // 5. Halaman Statis
        Schema::create('halamanstatis', function (Blueprint $table) {
            $table->id('id_halaman');
            $table->string('judul');
            $table->string('judul_seo');
            $table->text('isi_halaman');
            $table->date('tgl_posting');
            $table->string('gambar')->nullable();
            $table->string('username');
            $table->integer('dibaca')->default(0);
            $table->time('jam');
            $table->string('hari');
            $table->timestamps();
        });

        // 6. Agenda
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('id_agenda');
            $table->string('tema');
            $table->string('tema_seo');
            $table->text('isi_agenda');
            $table->string('tempat');
            $table->string('pengirim');
            $table->string('gambar')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->date('tgl_posting');
            $table->string('jam');
            $table->integer('dibaca')->default(0);
            $table->string('username');
            $table->timestamps();
        });

        // 7. Album
        Schema::create('album', function (Blueprint $table) {
            $table->id('id_album');
            $table->string('jdl_album');
            $table->string('album_seo');
            $table->text('keterangan')->nullable();
            $table->string('gbr_album')->nullable();
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->integer('hits_album')->default(0);
            $table->date('tgl_posting');
            $table->time('jam');
            $table->string('hari');
            $table->string('username');
            $table->timestamps();
        });

        // 8. Identitas
        Schema::create('identitas', function (Blueprint $table) {
            $table->id('id_identitas');
            $table->string('nama_website');
            $table->string('email');
            $table->string('url');
            $table->string('facebook')->nullable();
            $table->string('rekening')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('meta_deskripsi')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('favicon')->nullable();
            $table->text('maps')->nullable();
            $table->timestamps();
        });

        // 9. Banner
        Schema::create('banner', function (Blueprint $table) {
            $table->id('id_banner');
            $table->string('judul');
            $table->string('url');
            $table->string('gambar');
            $table->date('tgl_posting');
            $table->timestamps();
        });

        // 10. Background
        Schema::create('background', function (Blueprint $table) {
            $table->id('id_background');
            $table->string('gambar');
            $table->timestamps();
        });

        // 11. Menu
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->integer('id_parent')->default(0);
            $table->string('nama_menu');
            $table->string('link');
            $table->enum('aktif', ['Ya', 'Tidak'])->default('Ya');
            $table->enum('position', ['Top', 'Bottom'])->default('Bottom');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
        Schema::dropIfExists('background');
        Schema::dropIfExists('banner');
        Schema::dropIfExists('identitas');
        Schema::dropIfExists('album');
        Schema::dropIfExists('agenda');
        Schema::dropIfExists('halamanstatis');
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('tag');
        Schema::dropIfExists('kategori');
    }
};
