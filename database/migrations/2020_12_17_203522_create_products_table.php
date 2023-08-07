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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('color')->nullable();
            $table->longText('description');
            $table->longText('specification')->nullable();
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->string('picture');
            $table->integer('ratings')->nullable('1');
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->boolean('status')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('no_views')->default(0);
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
