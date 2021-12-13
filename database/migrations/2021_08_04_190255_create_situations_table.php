<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateSituationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situations', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('situations')->insert(
            [
                ['description' => 'Em aberto', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Finalizado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['description' => 'Cancelado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
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
        Schema::dropIfExists('situations');
    }
}
