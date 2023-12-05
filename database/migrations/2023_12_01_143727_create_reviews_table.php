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
        Schema::create('review', function (Blueprint $table) {
            $table->id('id_review');
            $table->string('rating');
            $table->string('comment');
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_user');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('review', function (Blueprint $table) {
            $table->foreign('id_movie')->references('id_movie')->on('movies');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
