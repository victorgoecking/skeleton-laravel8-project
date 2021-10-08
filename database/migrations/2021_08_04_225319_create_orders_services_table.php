<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_description_order')->nullable();
            $table->decimal('discount_service', 9,2)->nullable();
            $table->decimal('order_service_subtotal', 9,2);
            $table->decimal('sales_value_service_used_order', 9,2);
            $table->decimal('service_cost_value_when_order_placed', 9,2)->nullable();
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
        Schema::dropIfExists('orders_services');
    }
}
