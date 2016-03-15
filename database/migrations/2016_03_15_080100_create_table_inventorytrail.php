<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventorytrail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorytrails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outletid')->unsigned();
            $table->integer('itemid')->unsigned();
            $table->decimal('amount', 7, 2);
            $table->enum('action', ['+', '-']);
            $table->integer('created_by')->unsigned();
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
        Schema::drop('inventorytrails');
    }
}
