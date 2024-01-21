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
        Schema::create('drone_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number_of_drones')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->unsignedInteger('range')->nullable(false);
            $table->unsignedInteger('loading_weight')->nullable(false);
            $table->unsignedInteger('max_time')->nullable(false);
            $table->unsignedInteger('lend_drones_sum')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /* |min:-2147483648|max:2147483647'
        return [
            'number_of_drones' => 'required|integer|min:1|max:4294967295',
            'name' => 'required|string|max:100',
            'range' => 'required|integer|min:1|max:4294967295',
            'loading_weight' => 'required|integer|min:1|max:4294967295',
            'max_time' => 'required|integer|min:1|max:4294967295',
            'lend_drones_sum' => 'required|integer|min:0|max:4294967295',
        ];
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drone_type');
    }
};
