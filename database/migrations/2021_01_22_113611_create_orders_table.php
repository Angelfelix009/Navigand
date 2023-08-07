<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('reference_id');
            $table->string('trans_id');
            $table->string('status');
            $table->text('cart_content');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('product_qty')->nullable();
            $table->integer('order_qty');
            $table->text('order_note');
            $table->string('price');
            $table->double('amount_paid');
            $table->double('total_bill');
            $table->string('order_status')->default('ongoing');
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
