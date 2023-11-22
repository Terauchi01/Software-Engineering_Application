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
        Schema::create('coop_user', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー
            $table->string("email_address", 100)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('coop_name', 100)->nullable(false);
            $table->string('representative_last_name', 10)->nullable(false);
            $table->string('representative_first_name', 10)->nullable(false);
            $table->string('representative_last_name_kana', 30)->nullable(false);
            $table->string('representative_first_name_kana', 30)->nullable(false);
            $table->unsignedBigInteger('license_information_id')->nullable(false);
            $table->unsignedBigInteger('account_information_id')->nullable(false);
            $table->unsignedBigInteger('bank_id')->nullable(false);
            $table->unsignedBigInteger('branch_id')->nullable(false);
            $table->string('account_type', 10)->nullable(false);
            $table->string('account_number', 255)->nullable(false);
            $table->string('account_name', 10)->nullable(false);
            $table->unsignedBigInteger('coop_locations_list_id')->nullable(false);
            $table->integer('employees')->nullable(false);
            $table->string('phone_number', 11)->nullable(false);
            $table->integer('land_or_air')->nullable(false);
            $table->integer('application_status')->nullable(false);
            $table->unsignedBigInteger('drone_list_id')->nullable(false);
            $table->integer('amount_of_compensation')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_user');
    }
};
