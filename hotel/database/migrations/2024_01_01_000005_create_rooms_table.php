<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->string('type');                    // e.g. "Deluxe King"
            $table->text('description')->nullable();
            $table->unsignedInteger('capacity')->default(2);
            $table->decimal('price', 10, 2);
            $table->boolean('is_available')->default(true);
            $table->string('image')->nullable();
            $table->json('amenities')->nullable();     // room-level amenities (array)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
