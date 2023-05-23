<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('managed_by');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('ticket_id');
            $table->text('description');
            $table->string('status');
            $table->float('hours');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('managed_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
