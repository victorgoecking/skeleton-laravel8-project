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
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignId('people_id')->constrained();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('people_id')->constrained();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreignId('people_id')->constrained();
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->constrained();
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->foreignId('cashier_id')->constrained();
            $table->foreignId('sale_id')->nullable()->constrained();
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('sale_status_id')->constrained();
            $table->foreignId('request_id')->constrained();
        });

        Schema::table('requests_products', function (Blueprint $table) {
            $table->foreignId('request_id')->constrained();
            $table->foreignId('product_id')->constrained();
        });

        Schema::table('requests_services', function (Blueprint $table) {
            $table->foreignId('request_id')->constrained();
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
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['people_id']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['people_id']);
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['people_id']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['client_id']);
        });

        Schema::table('cash_movements', function (Blueprint $table) {
            $table->dropForeign(['cashier_id']);
            $table->dropForeign(['sale_id']);
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['sale_status_id']);
            $table->dropForeign(['request_id']);
        });

        Schema::table('requests_products', function (Blueprint $table) {
            $table->dropForeign(['request_id']);
            $table->dropForeign(['product_id']);
        });

        Schema::table('requests_services', function (Blueprint $table) {
            $table->dropForeign(['request_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('payment_type_sales', function (Blueprint $table) {
            $table->dropForeign(['sale_id']);
            $table->dropForeign(['type_payment_id']);
        });
    }
}
