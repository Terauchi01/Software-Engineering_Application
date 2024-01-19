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
        Schema::create('admin_information', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100)->nullable(false);
            $table->string('representative_name', 100)->nullable(false);
            $table->string('address', 100)->nullable(false);
            $table->string('postal_code',7)->nullable(false);
            $table->integer('prefecture_id')->nullable(false);
            $table->string('coop_scale', 200)->nullable(false);
            $table->integer('capital_stock')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /*
        return [
            'company_name' => 'required|string|max:100',
            'representative_name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'postal_code' => 'required|string|size:7',
            'prefecture_id' => 'required|integer',
            'coop_scale' => 'required|string|max:200',
            'capital_stock' => 'required|integer',
        ];
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_information');
    }
};
