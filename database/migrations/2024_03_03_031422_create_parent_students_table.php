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
        Schema::create('parent_students', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('user_id')->comment("user login");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('schools_id')->comment("sekolah id");
            $table->foreign('schools_id')->references('id')->on('schools')->onDelete('cascade');
            $table->string('father_name', 100)->comment('Nama Ayah');
            $table->unsignedInteger('masters_occupation_father_id')->comment('ID Pekerjaan Ayah');
            $table->unsignedInteger('masters_religions_father_id')->comment('Agama Ayah');

            $table->string('father_phone', 20)->nullable()->comment('Telepon Ayah');
            $table->string('mother_name', 100)->comment('Nama Ibu');
            $table->unsignedInteger('masters_occupation_mother_id')->nullable()->comment('ID Pekerjaan Ibu');
            $table->unsignedInteger('masters_religions_mother_id')->comment('Agama Ibu');
            $table->string('mother_phone', 20)->nullable()->comment('Telepon Ibu');
            $table->timestamps();

            $table->foreign('masters_occupation_father_id')->references('id')->on('masters_occupation')->onDelete('cascade');
            $table->foreign('masters_occupation_mother_id')->references('id')->on('masters_occupation')->onDelete('cascade');
            $table->foreign('masters_religions_father_id')->references('id')->on('masters_religions')->onDelete('cascade');
            $table->foreign('masters_religions_mother_id')->references('id')->on('masters_religions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_students');
    }
};
