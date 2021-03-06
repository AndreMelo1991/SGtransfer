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
            $table->string('name');
            $table->string('cpf');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')
                  ->nullable();
            $table->string('password');
            $table->unsignedBigInteger('profile_id')
                  ->index();
            $table->foreign('profile_id')
                  ->references('id')
                  ->on('profiles');
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::enableForeignKeyConstraints();
 
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }

}
