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
        Schema::create('masters_majors', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('school_id')->comment("School ID");
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->string("name", 30)->comment("nama jurusan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters_majors');
    }
};
