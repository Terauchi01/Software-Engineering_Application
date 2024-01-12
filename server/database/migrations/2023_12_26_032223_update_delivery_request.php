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
        Schema::table('delivery_request', function (Blueprint $table) {
            // $table->unsignedBigInteger('delivery_destination_id')->nullable();
            $table->foreign('delivery_destination_id')->references('id')->on('user');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user');

            // $table->unsignedBigInteger('collection_company_id')->nullable();
            $table->foreign('collection_company_id')->references('id')->on('coop_user');

            // $table->unsignedBigInteger('intermediate_delivery_company_id')->nullable();
            $table->foreign('intermediate_delivery_company_id')->references('id')->on('coop_user');

            // $table->unsignedBigInteger('delivery_company_id')->nullable();
            $table->foreign('delivery_company_id')->references('id')->on('coop_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_request', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->unsignedBigInteger('delivery_destination_id')->nullable(false);
            $table->unsignedBigInteger('collection_company_id')->nullable(false);
            $table->unsignedBigInteger('intermediate_delivery_company_id')->nullable(false);
            $table->unsignedBigInteger('delivery_company_id')->nullable(false);
        });
    }
};
