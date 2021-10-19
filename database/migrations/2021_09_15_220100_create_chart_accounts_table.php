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
        DB::table('chart_accounts')->insert(
            [
                ['type' => 'Pagamentos','description' => 'Adiantamento - funcionários', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Ajuste de caixa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Alimentação', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Aluguel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Aquisição de equipamentos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Combustivel e translados', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Confraternizações', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Contabilidade', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Encargos funcionários', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Energia elétrica + água', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Manutenção equipamentos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Outras despesas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Supermercado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Telefonia e internet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Pagamentos','description' => 'Transportadora', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Ajuste de caixa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Outras receitas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Prestações de serviços', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['type' => 'Recebimentos','description' => 'Vendas de produtos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
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
        Schema::dropIfExists('chart_accounts');
    }
}
