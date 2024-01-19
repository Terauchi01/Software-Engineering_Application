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
            $table->id();
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
            $table->foreign('delivery_destination_id')->references('id')->on('user');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('collection_company_id')->references('id')->on('coop_user');
            $table->foreign('intermediate_delivery_company_id')->references('id')->on('coop_user');
            $table->foreign('delivery_company_id')->references('id')->on('coop_user');
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /* 
        return [
            'delivery_destination_id' => 'required|exists:user,id',
            'collection_company_id' => 'nullable|exists:coop_user,id',
            'intermediate_delivery_company_id' => 'nullable|exists:coop_user,id',
            'delivery_company_id' => 'nullable|exists:coop_user,id',
            'collection_company_remuneration' => 'required|integer',
            'intermediate_delivery_company_remuneration' => 'required|integer',
            'delivery_company_remuneration' => 'required|integer',
            'delivery_status' => 'required|integer',
            'item' => 'required|string',
            'request_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'user_id' => 'nullable|exists:user,id',
        ];
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_request');
    }
};
