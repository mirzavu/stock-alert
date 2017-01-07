<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('stock');
            $table->decimal('buyprice', 10, 2)->nullable();
            $table->decimal('todaysprice', 10, 2)->nullable();
            $table->decimal('currentprice', 10, 2)->nullable();
            $table->decimal('maxgain', 10, 2)->nullable();
            $table->boolean('email')->default(false)->nullable();
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
        Schema::drop('stocks');
    }
}
