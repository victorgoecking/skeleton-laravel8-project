<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('person_type',2)->default('PF');
            $table->string('cpf',14)->nullable();
            $table->string('corporate_reason')->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('cnpj',18)->nullable();
            $table->char('sex',1)->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps();
        });
        DB::table('people')->insert(
            [
                ['name' => 'Administrador',
                    'person_type' => 'PF',
                ]

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
        Schema::dropIfExists('people');
    }
}
