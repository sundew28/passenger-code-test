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
        Schema::create('post_codes', function (Blueprint $table) {
            $table->id();
            $table->string('postcode');
            $table->string('latitude')->nullable();            
            $table->string('longitude')->nullable();
            $table->string('region')->nullable();
            $table->string('pfa')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_codes');
    }
};
