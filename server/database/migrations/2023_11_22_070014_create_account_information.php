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
        Schema::create('account_information', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー
            $table->unsignedBigInteger('bank_id')->nullable(false);
            $table->unsignedBigInteger('branch_id')->nullable(false);
            $table->string('account_type', 10)->nullable(false);
            $table->string('account_number', 255)->nullable(false);
            $table->string('account_name', 10)->nullable(false);
            $table->string('account_name_kana', 30)->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_information');
    }
};
