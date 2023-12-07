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
        Schema::create('delivery_location_image', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー
            $table->char('image_url', 200)->nullable(false);
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_location_image');
    }
};
