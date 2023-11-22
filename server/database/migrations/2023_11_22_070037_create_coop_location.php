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
        Schema::create('coop_location', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー
            $table->integer('postal_code')->nullable(false);
            $table->integer('prefecture_id')->nullable(false);
            $table->integer('city_id')->nullable(false);
            $table->integer('town_id')->nullable(false);
            $table->integer('block_id')->nullable(false);
            $table->string('representative_last_name', 10)->nullable(false);
            $table->string('representative_first_name', 10)->nullable(false);
            $table->string('representative_last_name_kana', 30)->nullable(false);
            $table->string('representative_first_name_kana', 30)->nullable(false);
            $table->string('license_holder_last_name', 10)->nullable(false);
            $table->string('license_holder_first_name', 10)->nullable(false);
            $table->string('license_holder_last_name_kana', 30)->nullable(false);
            $table->string('license_holder_first_name_kana', 30)->nullable(false);
            $table->unsignedBigInteger('license_id')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_location');
    }
};
