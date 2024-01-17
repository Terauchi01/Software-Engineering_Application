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
        Schema::create('coop_drones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drone_type_id')->nullable(false);
            $table->unsignedBigInteger('coop_user_id')->nullable();
            $table->timestamp('purchase_date')->nullable(false);
            $table->tinyInteger('drone_status')->nullable(false);
            $table->tinyInteger('possession_or_loan')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
            
            $table->foreign('drone_type_id')->references('id')->on('drone_type');
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
            $table->timestamp('lending_period')->nullable();
            $table->unsignedBigInteger('operating_time')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_drones');
    }
};
