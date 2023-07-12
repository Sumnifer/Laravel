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
        Schema::create('take_overs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('phone')->nullable();
            $table->string('problem')->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->unsignedBigInteger('technician_id'); // Foreign key pour le technicien
            $table->unsignedBigInteger('lead_technician_id'); // Foreign key pour le technicien responsable
            $table->unsignedBigInteger('loan_material_id')->nullable();
            $table->timestamps();
            $table->string('intervention')->nullable();
            $table->boolean('invoice')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status');

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('technician_id')->references('id')->on('users');
            $table->foreign('lead_technician_id')->references('id')->on('users');
            $table->foreign('material_id')->references('id')->on('materials');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('take_overs');
    }
};
