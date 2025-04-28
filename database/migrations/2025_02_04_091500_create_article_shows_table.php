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
        Schema::create('article_shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone_number_id');
            $table->foreign('phone_number_id')->references('id')->on('phone_numbers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('banner');
            $table->string('judul');
            $table->longText('article');
            $table->enum('status', ['publish', 'schedule', 'private'])->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_shows');
    }
};
