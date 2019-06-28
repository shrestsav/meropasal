<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cost_price')->unsigned()->default(0);
            $table->integer('market_price')->unsigned()->default(0);
            $table->integer('discount')->unsigned()->default(0);
            $table->integer('sell_price')->unsigned()->default(0);
            $table->integer('quantity')->unsigned()->default(0);
            $table->longText('images')->nullable();
            $table->dateTime('purchase_date')->nullable();
            $table->string('purchase_from')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('items');
    }
}
