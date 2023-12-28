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
        Schema::table('coop_location', function (Blueprint $table) {
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coop_location', function (Blueprint $table) {
            $table->dropColumn('coop_user_id');
        });
    }
};
