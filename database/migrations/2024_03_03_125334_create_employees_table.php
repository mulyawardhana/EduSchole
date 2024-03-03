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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('school_id')->comment("School ID");
            $table->foreign('school_id')->references('id')->on('schools');

            $table->string('name')->comment('Nama Pegawai');
            $table->string('phone_whatsapp')->comment('Telepon/WhatsApp');
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable()->comment('Jenis Kelamin (Laki-laki, Perempuan, atau kosong)');

            $table->unsignedInteger('masters_religion_id')->comment('Agama');
            $table->foreign('masters_religion_id')->references('id')->on('masters_religions');

            $table->string('place_of_birth')->nullable()->comment('Tempat Lahir (bisa kosong)');
            $table->date('date_of_birth')->nullable()->comment('Tanggal Lahir (MM/DD/YYYY, bisa kosong)');
            $table->string('address')->comment('Alamat');
            $table->unsignedInteger('masters_province_id')->comment('ID Provinsi');
            $table->foreign('masters_province_id')->references('id')->on('masters_province');

            $table->unsignedBigInteger('masters_district_id')->comment('ID Kabupaten');
            $table->foreign('masters_district_id')->references('id')->on('masters_district');

            $table->unsignedBigInteger('masters_subdistrict_id')->comment('ID Kecamatan');
            $table->foreign('masters_subdistrict_id')->references('id')->on('masters_subdistrict');

            $table->unsignedBigInteger('masters_village_id')->comment('ID Desa');
            $table->foreign('masters_village_id')->references('id')->on('masters_village');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
