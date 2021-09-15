<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->constrained();
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->foreignId('cashier_id')->constrained();
            $table->foreignId('sale_id')->nullable()->constrained();
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('sale_status_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('orders_products', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
        });

        Schema::table('orders_services', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('service_id')->constrained();
        });

        Schema::table('payment_type_sales', function (Blueprint $table) {
            $table->foreignId('sale_id')->constrained();
            $table->foreignId('type_payment_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['client_id']);
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->dropForeign(['cashier_id']);
            $table->dropForeign(['sale_id']);
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['sale_status_id']);
            $table->dropForeign(['order_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('orders_products', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });

        Schema::table('orders_services', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('payment_type_sales', function (Blueprint $table) {
            $table->dropForeign(['sale_id']);
            $table->dropForeign(['type_payment_id']);
        });
    }
}
