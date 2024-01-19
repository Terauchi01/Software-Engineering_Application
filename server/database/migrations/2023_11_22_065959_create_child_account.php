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
        Schema::create('child_account', function (Blueprint $table) {
            $table->id();
            $table->integer("authority")->nullable(false);
            $table->string("user_name",100)->nullable(false);
            $table->string("email_address",100)->nullable(false);
            $table->string('password', 200)->nullable(false);
            $table->timestamps();
            $table->timestamp('deletion_date')->nullable()->default(null);
        });
        /*
        return [
            'authority' => 'required|integer',
            'user_name' => 'required|string|max:100',
            'email_address' => 'required|email|max:100',
            'password' => 'required|string|max:200',
        ];
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_account');
    }
};
