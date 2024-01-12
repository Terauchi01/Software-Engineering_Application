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
        Schema::table('favorite', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id')->nullable()->change();
            $table->foreign('sender_id')->references('id')->on('user');

            $table->unsignedBigInteger('destination_user_id')->nullable()->change();
            $table->foreign('destination_user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favorite', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id')->nullable(false);
            $table->unsignedBigInteger('destination_user_id')->nullable(false);
        });
    }
};
