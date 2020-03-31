<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('user_role');
            $table->string('pro_name');
            $table->string('pro_band');
            $table->string('pro_category');
            $table->float('pro_price', 10, 2);
            $table->float('pro_offprice', 10, 2)->nullable();
            $table->integer('pro_qty');
            $table->string('pro_size');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('pro_image');
            $table->string('pro_g_image');
            $table->tinyInteger('pro_status'); 
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
        Schema::dropIfExists('products');
    }
}