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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->char('email_address', 100)->nullable(false);
            $table->char('password', 255)->nullable(false);
            $table->char('prefecture_id', 100);
            $table->char('city_id', 100);
            $table->char('town', 100);
            $table->char('block', 100);
            $table->integer('postal_code')->nullable(false);
            $table->string('phone_number', 11)->nullable(false);
            $table->string('user_last_name', 100)->nullable(false);
            $table->string('user_first_name', 100)->nullable(false);
            $table->string('user_last_name_kana', 300)->nullable(false);
            $table->string('user_first_name_kana', 300)->nullable(false);
            $table->unsignedBigInteger('unpaid_charge')->default(0);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
