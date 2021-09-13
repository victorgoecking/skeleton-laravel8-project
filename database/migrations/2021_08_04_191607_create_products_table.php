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
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('product_cost_value', 9,2);
            $table->decimal('profit_percentage', 9,2)->nullable();
            $table->decimal('sales_value_product_used', 9,2)->nullable();
            $table->string('weight', 10)->nullable();
            $table->string('width', 10)->nullable();
            $table->string('height', 10)->nullable();
            $table->string('length', 10)->nullable();
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
        Schema::dropIfExists('products');
    }
}
