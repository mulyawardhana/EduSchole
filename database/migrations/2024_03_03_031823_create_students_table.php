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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('user_id')->comment("User ID");
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('school_id')->comment("School ID");
            $table->foreign('school_id')->references('id')->on('schools');

            $table->string('nisn', 20)->nullable()->unique()->comment('NISN');
            $table->string('nis', 20)->nullable()->unique()->comment('NIS');

            $table->string('first_name')->comment('Nama Depan');
            $table->string('middle_name')->nullable()->comment('Nama tengah');
            $table->string('last_name')->nullable()->comment('Nama Belakang');
            $table->string('nickname')->nullable()->comment('Nama Panggilan');
            $table->string('place_of_birth', 100)->comment('Tempat Lahir');
            $table->date('date_of_birth')->comment('Tanggal Lahir');
            $table->unsignedInteger('masters_genders_id')->comment('Jenis Kelamin');
            $table->foreign('masters_genders_id')->references('id')->on('masters_genders');

            $table->string('phone_number', 20)->comment('Nomor Telepon');
            $table->unsignedInteger('masters_religion_id')->comment('Agama');
            $table->foreign('masters_religion_id')->references('id')->on('masters_religions');

            $table->string('email', 100)->comment('Email');
            $table->string('previous_school', 100)->comment('Sekolah Asal');
            $table->text('address')->comment('Alamat');

            $table->unsignedInteger('masters_majors_id')->nullable()->comment('Jurusan');
            $table->foreign('masters_majors_id')->references('id')->on('masters_majors');

            $table->unsignedInteger('masters_classes_id')->comment('Kelas');
            $table->foreign('masters_classes_id')->references('id')->on('masters_classes');

            $table->string('batch', 20)->comment('Angkatan');
            $table->string('photo', 255)->nullable()->comment('Foto latar belakang merah (nama file)');
            $table->string('skhu_scan', 255)->nullable()->comment('Pemindaian SKHU (nama file)');
            $table->string('family_card_scan', 255)->nullable()->comment('Pemindaian Kartu Keluarga (nama file)');

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
        Schema::dropIfExists('students');
    }
};
