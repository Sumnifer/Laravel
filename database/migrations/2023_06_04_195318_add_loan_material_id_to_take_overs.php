<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('take_overs', function (Blueprint $table) {
            $table->foreign('loan_material_id')->references('id')->on('loan_materials');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('take_overs', function (Blueprint $table) {
            //
        });
    }
};
