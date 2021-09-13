<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('budget')->default(0);
            $table->decimal('total', 9,2);
            $table->decimal('discount', 9,2)->nullable();
            $table->decimal('cost_freight', 9,2)->nullable();
            $table->integer('delivery_address_id')->nullable();
            $table->date('request_date');
            $table->date('delivery_forecast')->nullable();
            $table->string('validity', 100)->nullable();
            $table->text('note')->nullable();
            $table->text('internal_note')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
