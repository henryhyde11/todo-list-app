<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 255);
            $table->string('image_uri')->nullable();
            $table->timestamps();
            $table->date('expiration_at')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
