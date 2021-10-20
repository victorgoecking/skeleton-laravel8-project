<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateChartAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->string('name', 100);
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('chart_accounts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        DB::table('chart_accounts')->insert(
            [
                ['type' => 'Pagamentos','name' => 'Adiantamento - funcionários', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Ajuste de caixa', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Alimentação', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Aluguel', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Aquisição de equipamentos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Combustivel e translados', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Confraternizações', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Contabilidade', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Encargos funcionários', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Energia elétrica + água', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Manutenção equipamentos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Outras despesas', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Supermercado', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Telefonia e internet', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','name' => 'Transportadora', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','name' => 'Ajuste de caixa', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','name' => 'Outras receitas', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','name' => 'Prestações de serviços', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','name' => 'Vendas de produtos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
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
        Schema::table('chart_accounts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('chart_accounts');
    }
}
