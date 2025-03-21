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
        Schema::create('article_show_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_show_id');
            $table->foreign('article_show_id')->references('id')->on('article_shows')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image');
            $table->string('image_alt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_show_galleries');
    }
};
