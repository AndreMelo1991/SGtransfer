<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                  ->index();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->unsignedBigInteger('user_id_send')
                  ->index();
            $table->foreign('user_id_send')
                  ->references('id')
                  ->on('users');
            $table->decimal('amount', 10,2);
            $table->timestamps();
        });
        
        Schema::enableForeignKeyConstraints();

    }
    
    public function down()
    {
        Schema::dropIfExists('transactions');
    }

}
