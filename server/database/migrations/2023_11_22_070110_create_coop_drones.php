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
            $table->timestamp('operating_time')->nullable(false);
            $table->timestamp('purchase_date')->nullable(false);
            $table->tinyInteger('drone_status')->nullable(false);
            $table->tinyInteger('possession_or_loan')->nullable(false);
            $table->timestamp('lending_period')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
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
