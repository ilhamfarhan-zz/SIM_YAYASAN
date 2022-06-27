<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // AKun
            $table->string('npp')->unique();
            $table->string('password');
            $table->string('level');
            $table->string('status');
            $table->string('name');
            $table->string('jabatan');
            // identitas
            $table->string('tanggal_masuk')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('npsn')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('nik')->nullable();
            $table->string('jk')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('ttl')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();
            $table->string('kk')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('agama')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_pajak')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('nama_negara')->nullable();
            $table->string('kawin')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('nip_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->string('niy')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('kartu_pegawai')->nullable();
            $table->string('kartu_pasangan')->nullable();
            $table->string('nomor_rumah')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('keluar')->nullable();
            $table->string('tanggal_keluar')->nullable();
            $table->string('status_user')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
