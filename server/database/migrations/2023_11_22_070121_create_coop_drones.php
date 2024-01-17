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
            $table->foreign('drone_type_id')->references('id')->on('drone_type');
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
            $table->timestamp('lending_period')->nullable();
            $table->unsignedBigInteger('operating_time')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /* 
        return [
            'drone_type_id' => 'required|integer|exists:drone_type,id',
            'coop_user_id' => 'nullable|integer|exists:coop_user,id',
            'purchase_date' => 'required|date', // You might need to adjust the date format
            'drone_status' => 'required|integer',
            'possession_or_loan' => 'required|integer',
            'lending_period' => 'nullable|date', // You might need to adjust the date format
            'operating_time' => 'required|integer',
            // Add more rules for other columns as needed
        ];
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_drones');
    }
};
