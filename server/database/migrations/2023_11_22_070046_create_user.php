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
            $table->id(); // 自動増分の主キー
            $table->char('email_address', 100)->nullable(false);
            $table->char('password', 255)->nullable(false);
            $table->char('address', 200)->nullable(false);
            $table->integer('postal_code')->nullable(false);
            $table->string('phone_number', 11)->nullable(false);
            $table->string('user_last_name', 10)->nullable(false);
            $table->string('user_first_name', 10)->nullable(false);
            $table->string('user_last_name_kana', 30)->nullable(false);
            $table->string('user_first_name_kana', 30)->nullable(false);
            $table->unsignedBigInteger('delivery_location_image_list_id')->nullable(false);
            $table->unsignedBigInteger('favorites_list_id')->nullable(false);
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
