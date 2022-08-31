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
            $table->foreignId('city_id')->constrained();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('situation_id')->constrained();
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->foreignId('cashier_id')->constrained();
            $table->foreignId('order_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('chart_accounts_id')->constrained();
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

        Schema::table('form_payment_orders', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('form_payment_id')->constrained();
        });

        Schema::table('form_payment_cash_movements', function (Blueprint $table) {
            $table->foreignId('cash_movement_id')->constrained();
            $table->foreignId('form_payment_id')->constrained();
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
            $table->dropForeign(['city_id']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['situation_id']);
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->dropForeign(['cashier_id']);
            $table->dropForeign(['order_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['chart_accounts_id']);
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

        Schema::table('form_payment_orders', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['form_payment_id']);
        });
        Schema::table('form_payment_cash_movements', function (Blueprint $table) {
            $table->dropForeign(['cash_movement_id']);
            $table->dropForeign(['form_payment_id']);
        });

    }
}
