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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id('subscriber_id');
            $table->char('email', 255);
            $table->text('question');
            $table->char('frequency', 50);
            $table->boolean('new_arrivals');
            $table->boolean('selection_by_genre');
            $table->boolean('recommended_papers');
            $table->boolean('discount_notifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
