<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        USER
        */
        Schema::create('user', function (Blueprint $table) {
            $table->id('iduser');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['admin','petugas']);
            $table->timestamps();
        });

        /*
        PENYEWA
        */
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id('idpenyewa');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('hp');
            $table->text('alamat')->nullable();
            $table->string('password');
            $table->timestamps();
        });

        /*
        MASTER
        */
        Schema::create('merk', function (Blueprint $table) {
            $table->id('idmerk');
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('kondisi', function (Blueprint $table) {
            $table->id('idkondisi');
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->id('idkategori');
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('denda', function (Blueprint $table) {
            $table->id('iddenda');
            $table->string('nama');
            $table->integer('nominal');
            $table->timestamps();
        });

        /*
        ARTIKEL
        */
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('idartikel');
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable();

            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('iduser')->on('user')->cascadeOnDelete();

            $table->timestamps();
        });

        /*
        KOMENTAR
        */
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('idkomentar');

            $table->unsignedBigInteger('idartikel');
            $table->foreign('idartikel')->references('idartikel')->on('artikel')->cascadeOnDelete();

            $table->unsignedBigInteger('idpenyewa')->nullable();
            $table->foreign('idpenyewa')->references('idpenyewa')->on('penyewa')->nullOnDelete();

            $table->text('isi');
            $table->timestamps();
        });

        /*
        ALAT
        */
        Schema::create('alat', function (Blueprint $table) {
            $table->id('idalat');
            $table->string('nama');
            $table->integer('hargasewa');
            $table->integer('stok');

            $table->unsignedBigInteger('idmerk');
            $table->unsignedBigInteger('idkondisi');
            $table->unsignedBigInteger('idkategori');

            $table->foreign('idmerk')->references('idmerk')->on('merk')->cascadeOnDelete();
            $table->foreign('idkondisi')->references('idkondisi')->on('kondisi')->cascadeOnDelete();
            $table->foreign('idkategori')->references('idkategori')->on('kategori')->cascadeOnDelete();

            $table->timestamps();
        });

        /*
        PEMESANAN
        */
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('idpemesanan');

            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idpenyewa');

            $table->foreign('iduser')->references('iduser')->on('user')->cascadeOnDelete();
            $table->foreign('idpenyewa')->references('idpenyewa')->on('penyewa')->cascadeOnDelete();

            $table->date('tanggalpesan');
            $table->date('tanggalkembali')->nullable();

            $table->enum('status', ['diproses','disewa','selesai']);

            $table->timestamps();
        });

        /*
        DETAIL PEMESANAN
        */
        Schema::create('detailpemesanan', function (Blueprint $table) {
            $table->id('iddetailpemesanan');

            $table->unsignedBigInteger('idpemesanan');
            $table->unsignedBigInteger('idalat');
            $table->unsignedBigInteger('iddenda')->nullable();

            $table->foreign('idpemesanan')->references('idpemesanan')->on('pemesanan')->cascadeOnDelete();
            $table->foreign('idalat')->references('idalat')->on('alat')->cascadeOnDelete();
            $table->foreign('iddenda')->references('iddenda')->on('denda')->nullOnDelete();

            $table->integer('qty');
            $table->integer('harga');
            $table->integer('subtotal');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detailpemesanan');
        Schema::dropIfExists('pemesanan');
        Schema::dropIfExists('alat');
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('denda');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('kondisi');
        Schema::dropIfExists('merk');
        Schema::dropIfExists('penyewa');
        Schema::dropIfExists('user');
    }
};