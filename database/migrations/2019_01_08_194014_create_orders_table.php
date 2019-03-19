<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< 83179ce5584507dc6f7ebeecf2dbf8727a1e4026
            $table->string('name');
            $table->string('image');
            $table->float('price');
            $table->float('qty');
=======
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
>>>>>>> make add and wish button
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
