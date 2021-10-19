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
            $table->string('description', 100);
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('chart_accounts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        DB::table('chart_accounts')->insert(
            [
                ['type' => 'Pagamentos','description' => 'Adiantamento - funcionários', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Ajuste de caixa', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Alimentação', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Aluguel', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Aquisição de equipamentos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Combustivel e translados', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Confraternizações', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Contabilidade', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Encargos funcionários', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Energia elétrica + água', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Manutenção equipamentos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Outras despesas', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Supermercado', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Telefonia e internet', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Transportadora', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Ajuste de caixa', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Outras receitas', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Prestações de serviços', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Vendas de produtos', 'user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
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
