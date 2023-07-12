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
        Schema::create('loan_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('technician_id'); // Foreign key pour le technicien
            $table->unsignedBigInteger('lead_technician_id'); // Foreign key pour le technicien responsable
            $table->unsignedBigInteger('take_over_id')->nullable();
            $table->timestamps();
            $table->string('attachment')->nullable();
            $table->integer('status');

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('technician_id')->references('id')->on('users');
            $table->foreign('lead_technician_id')->references('id')->on('users');
            $table->foreign('take_over_id')->references('id')->on('take_overs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_materials');
    }
};
