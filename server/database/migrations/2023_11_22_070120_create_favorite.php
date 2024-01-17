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
        Schema::create('favorite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable(false);
            $table->unsignedBigInteger('destination_user_id')->nullable(false);
            $table->unsignedBigInteger('drone_type_id')->nullable();
            $table->foreign('drone_type_id')->references('id')->on('drone_type');
            $table->unsignedBigInteger('coop_user_id')->nullable();
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
            $table->timestamp('lending_period')->nullable();
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /* 
        return [
            'sender_id' => 'required|integer',
            'destination_user_id' => 'required|integer',
            'drone_type_id' => 'nullable|integer|exists:drone_type,id',
            'coop_user_id' => 'nullable|integer|exists:coop_user,id',
            'lending_period' => 'nullable|date', // You might need to adjust the date format
            // Add more rules for other columns as needed
        ];
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite');
    }
};
