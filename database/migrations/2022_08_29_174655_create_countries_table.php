<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('name_pt', 60);
            $table->string('initials', 2);
            $table->integer('bacen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('countries')->insert(
            [
                ['name' => 'Brazil',
                    'name_pt' => 'Brasil',
                    'initials' => 'BR',
                    'bacen' => 1058,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
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
        Schema::dropIfExists('countries');
    }
}
