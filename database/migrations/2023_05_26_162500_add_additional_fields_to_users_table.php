<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
public function up()
{
Schema::table('users', function (Blueprint $table) {
$table->string('first_name')->after('name');
$table->string('address')->nullable();
$table->string('postal_code')->nullable();
$table->string('city')->nullable();
$table->date('birthdate')->nullable();
$table->string('phone_number')->nullable();
$table->integer('level')->nullable();
$table->string('status')->nullable();
});
}

public function down()
{
Schema::table('users', function (Blueprint $table) {
$table->dropColumn(['first_name', 'address', 'postal_code', 'city', 'birthdate', 'phone_number', 'level', 'status']);
});
}
}
