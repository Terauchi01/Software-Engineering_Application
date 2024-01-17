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
        Schema::create('coop_location', function (Blueprint $table) {
            $table->id();
            $table->integer('postal_code')->nullable(false);
            $table->integer('prefecture_id')->nullable(false);
            $table->integer('city_id')->nullable(false);
            $table->string('representative_last_name', 100)->nullable(false);
            $table->string('representative_first_name', 100)->nullable(false);
            $table->string('representative_last_name_kana', 100)->nullable(false);
            $table->string('representative_first_name_kana', 100)->nullable(false);
            $table->string('license_holder_last_name', 100)->nullable(false);
            $table->string('license_holder_first_name', 100)->nullable(false);
            $table->string('license_holder_last_name_kana', 100)->nullable(false);
            $table->string('license_holder_first_name_kana', 100)->nullable(false);
            $table->unsignedBigInteger('license_id')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
            $table->string('town', 100)->nullable();
            $table->string('block', 100)->nullable();

            $table->unsignedBigInteger('coop_user_id')->nullable();
            $table->foreign('coop_user_id')->references('id')->on('coop_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_location');
    }
};
