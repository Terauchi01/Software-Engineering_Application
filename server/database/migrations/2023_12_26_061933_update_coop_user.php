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
            $table->dropColumn('coop_locations_list_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coop_user', function (Blueprint $table) {
            $table->unsignedBigInteger('coop_locations_list_id')->nullable();
        });
    }
};
