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
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('prefecture_id');
            $table->string('city_code')->comment('市区町村コード');
            $table->string('name')->comment('市区町村名');

            $table->index('prefecture_id');
            $table->index('name');

            $table->foreign('prefecture_id')
            ->references('id')
            ->on('mst_prefectures')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
