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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->char('title', 50);
            $table->char('author', 50);
            $table->char('description', 50);
            $table->char('cover_image', 255);
            $table->unsignedInteger('genre_id');
            $table->foreign('genre_id')->references('genre_id')->on('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
