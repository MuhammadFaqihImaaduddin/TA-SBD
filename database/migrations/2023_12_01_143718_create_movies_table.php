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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('id_movie');
            $table->string('title');
            $table->date('release_date');
            $table->unsignedBigInteger('id_genre');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_review')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('id_genre')->references('id_genre')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
