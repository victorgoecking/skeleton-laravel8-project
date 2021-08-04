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
        Schema::table('adresses', function (Blueprint $table) {
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
            $table->foreignId('sales_statuses_id')->constrained();
            $table->foreignId('request_id')->constrained();
        });

//        Schema::table('types_payments', function (Blueprint $table) {
//            $table->foreignId('types_payments_id')->constrained();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adresses', function (Blueprint $table) {
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
            $table->dropForeign(['sales_statuses_id']);
            $table->dropForeign(['request_id']);
        });

//        Schema::table('types_payments', function (Blueprint $table) {
//            $table->foreignId('types_payments_id')->constrained();
//        });
    }
}
