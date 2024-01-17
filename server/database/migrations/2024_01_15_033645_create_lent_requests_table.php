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
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('deletion_date')->nullable();
            $table->timestamps();
        });
        /*
        return [
            'user_id' => 'required|integer|exists:coop_user,id',
            'drone_type_id' => 'required|integer|exists:drone_type,id',
            'number' => 'required|integer',
            'start_date' => 'nullable|date', // You might need to adjust the date format
            'end_date' => 'nullable|date', // You might need to adjust the date format
            // Add more rules for other columns as needed
        ];
        */
    }

    public function down()
    {
        Schema::dropIfExists('lent_requests');
    }
}