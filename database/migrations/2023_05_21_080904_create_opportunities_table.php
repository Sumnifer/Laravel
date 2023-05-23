<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('opportunities', function (Blueprint $table) {
$table->id();
$table->string('description');
$table->string('status');
$table->unsignedBigInteger('managed_by');
$table->unsignedBigInteger('created_by');
$table->unsignedBigInteger('client_id');
$table->string('type');
$table->timestamps();

// Foreign key constraints
$table->foreign('managed_by')->references('id')->on('users')->onDelete('cascade');
$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('opportunities');
}
}
