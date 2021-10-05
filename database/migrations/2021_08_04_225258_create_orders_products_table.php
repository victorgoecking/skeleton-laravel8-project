<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_description_order')->nullable();
            $table->integer('quantity');
            $table->decimal('meter', 9,2)->nullable();
            $table->decimal('order_product_subtotal', 9,2);
            $table->decimal('discount_product', 9,2)->nullable();
            $table->decimal('product_cost_value_when_order_placed', 9,2);
            $table->decimal('sales_value_product_used_order', 9,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
    }
}
