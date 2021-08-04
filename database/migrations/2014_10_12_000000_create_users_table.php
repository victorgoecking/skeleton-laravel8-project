<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sector',45)->nullable();
            $table->string('occupation',45)->nullable();
            $table->text('note')->nullable();
            $table->integer('level')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            [
                ['people_id' => 1,
                    'name' => 'Suporte',
                    'email' => 'suporte@suporte.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                    'note' => 'Usuário de suporte',
                    'level' => 2,
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
        Schema::dropIfExists('users');
    }
}
