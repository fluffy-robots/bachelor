<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->string('ean')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('image_id')
                  ->references('id')->on('files')
                  ->onDelete('cascade');
        });
    }

    /*
[
    field : {
        name : 'Vægt'
        component: 'field_weight',
        data: []
    }
]

    */

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
