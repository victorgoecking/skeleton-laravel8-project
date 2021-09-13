<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('product_request_value', 9,2);
            $table->decimal('discount_product', 9,2)->nullable();
            $table->decimal('cost_value_when_order_placed', 9,2);
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
        Schema::dropIfExists('requests_products');
    }
}
