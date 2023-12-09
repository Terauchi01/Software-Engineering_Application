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
        Schema::table('account_information', function (Blueprint $table) {
            $table->string('account_type', 100)->nullable(false)->change();
            $table->string('account_name', 100)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_information', function (Blueprint $table) {
            $table->string('account_type', 10)->nullable(false)->change();
            $table->string('account_name', 10)->nullable(false)->change();
        });
    }
};
