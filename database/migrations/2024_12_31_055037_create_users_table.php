<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');           // Matches 'user_type' field
            $table->string('name');               // Matches 'name' field
            $table->string('email')->unique();    // Matches 'email' field
            $table->string('password');           // Matches 'password' field
            $table->timestamp('registration_date')->nullable(); // Matches 'registration_date' field
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
