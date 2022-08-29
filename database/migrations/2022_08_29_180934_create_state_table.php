<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->id();
            $table->string('name', 75);
            $table->string('uf', 2);
            $table->integer('ibge')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->string('ddd', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')->references('id')->on('country');
        });
        DB::table('state')->insert(
            [
                ['name' => 'Acre', 'uf' => 'AC', 'ibge' => 12, 'country_id' => 1, 'ddd' => '68', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Alagoas', 'uf' => 'AL', 'ibge' => 27, 'country_id' => 1, 'ddd' => '82', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Amazonas', 'uf' => 'AM', 'ibge' => 13, 'country_id' => 1, 'ddd' => '97,92', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Amapá', 'uf' => 'AP', 'ibge' => 16, 'country_id' => 1, 'ddd' => '96', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Bahia', 'uf' => 'BA', 'ibge' => 29, 'country_id' => 1, 'ddd' => '77,75,73,74,71', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Ceará', 'uf' => 'CE', 'ibge' => 23, 'country_id' => 1, 'ddd' => '88,85', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Distrito Federal', 'uf' => 'DF', 'ibge' => 53, 'country_id' => 1, 'ddd' => '61', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Espírito Santo', 'uf' => 'ES', 'ibge' => 32, 'country_id' => 1, 'ddd' => '28,27', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Goiás', 'uf' => 'GO', 'ibge' => 52, 'country_id' => 1, 'ddd' => '62,64,61', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Maranhão', 'uf' => 'MA', 'ibge' => 21, 'country_id' => 1, 'ddd' => '99,98', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Minas Gerais', 'uf' => 'MG', 'ibge' => 31, 'country_id' => 1, 'ddd' => '34,37,31,33,35,38,32', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Mato Grosso do Sul', 'uf' => 'MS', 'ibge' => 50, 'country_id' => 1, 'ddd' => '67', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Mato Grosso', 'uf' => 'MT', 'ibge' => 51, 'country_id' => 1, 'ddd' => '65,66', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Pará', 'uf' => 'PA', 'ibge' => 15, 'country_id' => 1, 'ddd' => '91,94,93', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Paraíba', 'uf' => 'PB', 'ibge' => 25, 'country_id' => 1, 'ddd' => '83', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Pernambuco', 'uf' => 'PE', 'ibge' => 26, 'country_id' => 1, 'ddd' => '81,87', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Piauí', 'uf' => 'PI', 'ibge' => 22, 'country_id' => 1, 'ddd' => '89,86', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Paraná', 'uf' => 'PR', 'ibge' => 41, 'country_id' => 1, 'ddd' => '43,41,42,44,45,46', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Rio de Janeiro', 'uf' => 'RJ', 'ibge' => 33, 'country_id' => 1, 'ddd' => '24,22,21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Rio Grande do Norte', 'uf' => 'RN', 'ibge' => 24, 'country_id' => 1, 'ddd' => '84', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Rondônia', 'uf' => 'RO', 'ibge' => 11, 'country_id' => 1, 'ddd' => '69', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Roraima', 'uf' => 'RR', 'ibge' => 14, 'country_id' => 1, 'ddd' => '95', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Rio Grande do Sul', 'uf' => 'RS', 'ibge' => 43, 'country_id' => 1, 'ddd' => '53,54,55,51', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Santa Catarina', 'uf' => 'SC', 'ibge' => 42, 'country_id' => 1, 'ddd' => '47,48,49', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Sergipe', 'uf' => 'SE', 'ibge' => 28, 'country_id' => 1, 'ddd' => '79', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'São Paulo', 'uf' => 'SP', 'ibge' => 35, 'country_id' => 1, 'ddd' => '11,12,13,14,15,16,17,18,19', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Tocantins', 'uf' => 'TO', 'ibge' => 17, 'country_id' => 1, 'ddd' => '63', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
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
        Schema::dropIfExists('state');
    }
}
