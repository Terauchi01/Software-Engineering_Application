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
        Schema::create('license_information', function (Blueprint $table) {
            $table->id();
            $table->time('date_of_issue')->nullable(false);
            $table->time('date_of_registration')->nullable(false);
            $table->string("name",100)->nullable(false);
            $table->time("birth")->nullable(false);
            $table->string("conditions",100)->nullable(false);
            $table->string("classification",100)->nullable(false);
            $table->string("ratings_and_limitations1",100);
            $table->string("ratings_and_limitations2",100);
            $table->string("ratings_and_limitations3",100);
            $table->string("number",30);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_information');
    }
};
