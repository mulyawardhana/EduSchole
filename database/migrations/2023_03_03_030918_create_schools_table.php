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
        Schema::create('schools', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger("user_id");
            $table->string('name')->nullable()->comment('Nama sekolah');
            $table->text('description')->nullable()->comment('Deskripsi sekolah');
            $table->text('address')->nullable()->comment('Alamat sekolah');
            $table->string('email', 100)->nullable()->comment('Email sekolah'); // Ubah panjang maksimal menjadi 100
            $table->string('phone', 20)->nullable()->comment('Telepon sekolah'); // Ubah panjang maksimal menjadi 20
            $table->string('facebook', 100)->nullable()->comment('Akun Facebook sekolah'); // Ubah panjang maksimal menjadi 100
            $table->string('instagram', 100)->nullable()->comment('Akun Instagram sekolah'); // Ubah panjang maksimal menjadi 100
            $table->string('youtube', 100)->nullable()->comment('Akun YouTube sekolah'); // Ubah panjang maksimal menjadi 100
            $table->string('google_maps')->nullable()->comment('Link Google Maps lokasi sekolah');
            $table->text('ppdb_message')->nullable()->comment('Pesan PPDB');
            $table->text('ppdb_email_message')->nullable()->comment('Pesan PPDB untuk email pendaftar');
            $table->string('ppdb_status', 50)->nullable()->comment('Status PPDB'); // Ubah panjang maksimal menjadi 50
            $table->string('logo')->nullable()->comment('Logo sekolah');
            $table->smallInteger('lesson_hours')->nullable()->comment('Durasi satu jam pelajaran'); // Ubah menjadi smallInteger
            $table->smallInteger('break_time')->nullable()->comment('Durasi istirahat'); // Ubah menjadi smallInteger
            $table->double('regular_school_fee')->nullable()->comment('Biaya sekolah reguler');
            $table->double('scholarship_school_fee')->nullable()->comment('Biaya sekolah beasiswa');
            $table->text('vision')->nullable()->comment('Visi sekolah');
            $table->text('mission')->nullable()->comment('Misi sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
