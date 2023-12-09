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
        Schema::table('coop_user', function (Blueprint $table) {
            $table->string('representative_last_name', 100)->nullable(false)->change();
            $table->string('representative_first_name', 100)->nullable(false)->change();
            $table->string('account_name', 100)->nullable(false)->change();
            $table->string('representative_last_name_kana', 100)->nullable(false)->change();
            $table->string('representative_first_name_kana', 100)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coop_user', function (Blueprint $table) {
            $table->string('representative_last_name', 100)->nullable(false)->change();
            $table->string('representative_first_name', 100)->nullable(false)->change();
            $table->string('account_name', 100)->nullable(false)->change();
            $table->string('representative_last_name_kana', 100)->nullable(false)->change();
            $table->string('representative_first_name_kana', 100)->nullable(false)->change();
        });
    }
};
