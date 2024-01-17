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
        Schema::create('drone_type', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_drones')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->integer('range')->nullable(false);
            $table->integer('loading_weight')->nullable(false);
            $table->integer('max_time')->nullable(false);
            $table->integer('lend_drones_sum')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drone_type');
    }
};
