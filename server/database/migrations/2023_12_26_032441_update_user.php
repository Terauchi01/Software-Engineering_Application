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
        Schema::table('user', function (Blueprint $table) {
            $table->unsignedBigInteger('unpaid_charge')->default(0);
            $table->dropColumn('delivery_location_image_list_id');
            $table->dropColumn('favorites_list_id');
            $table->dropColumn('address');
            $table->string('prefecture_id',100);
            $table->string('city_id',100);
            $table->string('town',100);
            $table->string('block',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('unpaid_charge');
            $table->unsignedBigInteger('delivery_location_image_list_id')->nullable(false);
            $table->unsignedBigInteger('favorites_list_id')->nullable(false);
            $table->dropColumn('prefecture_id');
            $table->dropColumn('city_id');
            $table->dropColumn('town_id');
            $table->dropColumn('block_id');
        });
    }
};
