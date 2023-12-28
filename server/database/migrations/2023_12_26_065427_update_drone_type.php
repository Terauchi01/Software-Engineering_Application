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
        Schema::table('drone_type', function (Blueprint $table) {
            $table->string('name', 100)->nullable(false);
            $table->integer('range')->nullable(false);
            $table->integer('loading_weight')->nullable(false);
            $table->integer('nax_time')->nullable(false);
            $table->integer('number_of_drones')->nullable(false);
            $table->integer('lend_drones_sum')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('drone_type', function (Blueprint $table) {
            $table->string('name', 10)->nullable(false);
            $table->integer('drone_spec')->nullable(false);
            $table->integer('number_of_drones')->nullable(false);
            $table->dropColumn('range');
            $table->dropColumn('loading_weight');
            $table->dropColumn('nax_time');
            $table->dropColumn('lend_drones_sum');
        });
    }
};
