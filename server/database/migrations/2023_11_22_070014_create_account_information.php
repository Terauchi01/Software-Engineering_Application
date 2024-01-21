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
        Schema::create('account_information', function (Blueprint $table) {
            $table->id();
            $table->string('bank_id',100)->nullable(false);
            $table->string('branch_id',100)->nullable(false);
            $table->string('account_type', 100)->nullable(false);
            $table->string('account_number', 255)->nullable(false);
            $table->string('account_name', 100)->nullable(false);
            $table->string('account_name_kana', 255)->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /*return [
            'bank_id' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'account_type' => 'required|string|max:100',
            'account_number' => 'required|string|max:255',
            'account_name' => 'required|string|max:100',
            'account_name_kana' => 'required|string|max:255',
        ]; 
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_information');
    }
};
