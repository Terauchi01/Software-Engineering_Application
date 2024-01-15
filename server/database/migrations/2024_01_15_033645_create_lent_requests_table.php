<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLentRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('lent_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('coop_user');
            $table->unsignedBigInteger('drone_type_id');
            $table->foreign('drone_type_id')->references('id')->on('drone_type');
            $table->integer('number');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('deletion_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lent_requests');
    }
}