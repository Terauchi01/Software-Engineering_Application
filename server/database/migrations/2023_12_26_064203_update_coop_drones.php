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
        Schema::table('coop_drones', function (Blueprint $table) {
            $table->foreign('drone_type_id')->references('id')->on('drone_type');
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
            $table->datetime('lending_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coop_drones', function (Blueprint $table) {
            $table->unsignedBigInteger('drone_type_id')->nullable(false);
            $table->unsignedBigInteger('coop_user_id')->nullable();
            $table->timestamp('lending_period')->nullable(false);
        });
    }
};
