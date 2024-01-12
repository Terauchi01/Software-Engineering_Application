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
        Schema::table('coop_user', function (Blueprint $table) {
            $table->unsignedBigInteger('child_status')->nullable();
            $table->unsignedBigInteger('pair_id')->nullable()->after('id');
            $table->foreign('pair_id')->references('id')->on('coop_user');
            $table->unsignedTinyInteger('pay_status')->default(0);
            $table->dropColumn('bank_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('account_type');
            $table->dropColumn('account_number');
            $table->dropColumn('account_name');
            $table->dropColumn('drone_list_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coop_user', function (Blueprint $table) {
            $table->dropColumn('child_status');
            $table->dropColumn('pair_id');
            $table->dropColumn('pay_status');
            $table->unsignedBigInteger('bank_id')->nullable(false);
            $table->unsignedBigInteger('branch_id')->nullable(false);
            $table->string('account_type', 100)->nullable(false);
            $table->string('account_number', 255)->nullable(false);
            $table->string('account_name', 100)->nullable(false);
            $table->unsignedBigInteger('drone_list_id')->nullable(false);
        });
    }
};
