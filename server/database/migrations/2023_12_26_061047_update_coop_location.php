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
            $table->dropColumn('town_id');
            $table->dropColumn('block_id');
            $table->string('town',100)->nullable();
            $table->string('block',100)->nullable();

            $table->unsignedBigInteger('coop_user_id')->nullable();
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
            $table->dropColumn('town');
            $table->dropColumn('block');
        });
    }
};
