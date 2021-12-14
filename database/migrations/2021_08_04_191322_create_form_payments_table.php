<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateFormPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_payments', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('form_payments')->insert(
            [
                ['description' => 'A Combinar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Boleto', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Cartão de Crédito', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Cartão de Débito', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Cheque', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Dinheiro à Vista', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Dinheiro Parcelado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'PIX', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Transferência', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Nota', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_payments');
    }
}
