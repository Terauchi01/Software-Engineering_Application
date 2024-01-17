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
        Schema::create('delivery_request', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー
            $table->unsignedBigInteger('delivery_destination_id')->nullable(false);
            $table->unsignedBigInteger('collection_company_id')->nullable();
            $table->unsignedBigInteger('intermediate_delivery_company_id')->nullable();
            $table->unsignedBigInteger('delivery_company_id')->nullable();
            $table->integer('collection_company_remuneration')->nullable(false);
            $table->integer('intermediate_delivery_company_remuneration')->nullable(false);
            $table->integer('delivery_company_remuneration')->nullable(false);
            $table->tinyInteger('delivery_status')->nullable(false);
            $table->string('item')->nullable(false);
            $table->timestamp('request_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_request');
    }
};
