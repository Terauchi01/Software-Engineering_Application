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
        Schema::create('coop_user', function (Blueprint $table) {
            $table->id();
            $table->string('email_address', 100)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('coop_name', 100)->nullable(false);
            $table->string('representative_last_name', 100)->nullable(false);
            $table->string('representative_first_name', 100)->nullable(false);
            $table->string('representative_last_name_kana', 100)->nullable(false);
            $table->string('representative_first_name_kana', 100)->nullable(false);
            $table->unsignedBigInteger('license_information_id')->nullable(false);
            $table->unsignedBigInteger('account_information_id')->nullable(false);
            $table->integer('employees')->nullable(false);
            $table->string('phone_number', 11)->nullable(false);
            $table->integer('land_or_air')->nullable(false);
            $table->integer('application_status')->nullable(false);
            $table->unsignedBigInteger('child_status')->nullable();
            $table->unsignedBigInteger('pair_id')->nullable();
            $table->foreign('pair_id')->references('id')->on('coop_user');
            $table->unsignedTinyInteger('pay_status')->default(0);
            $table->integer('amount_of_compensation')->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /* 
        return [
            'email_address' => 'required|email|max:100',
            'password' => 'required|string|max:255',
            'coop_name' => 'required|string|max:100',
            'representative_last_name' => 'required|string|max:100',
            'representative_first_name' => 'required|string|max:100',
            'representative_last_name_kana' => 'required|string|max:100',
            'representative_first_name_kana' => 'required|string|max:100',
            'license_information_id' => 'required|integer',
            'account_information_id' => 'required|integer',
            'employees' => 'required|integer',
            'phone_number' => 'required|string|max:11',
            'land_or_air' => 'required|integer',
            'application_status' => 'required|integer',
            'child_status' => 'nullable|integer',
            'pair_id' => 'nullable|integer|exists:coop_user,id',
            'pay_status' => 'required|integer',
            'amount_of_compensation' => 'required|integer',
        ];
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coop_user');
    }
};
