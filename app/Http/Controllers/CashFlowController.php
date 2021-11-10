<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\CashMovement;
use App\Models\FormPaymentCashMovements;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{

    public function __construct()
    {
        $this->bills_receive = CashMovement::with('formPaymentCashMovements', 'chartAccount')->where('type_movement', 'receber')->get();
        $this->bills_pay = CashMovement::with('formPaymentCashMovements', 'chartAccount')->where('type_movement', 'pagar')->get();

        $this->total_receive = 0.00;
        $this->total_receive_current = 0.00;
        $this->total_pay = 0.00;
        $this->total_pay_current = 0.00;

        foreach ($this->bills_receive as $bill_receive){
            $this->total_receive += $bill_receive->gross_value;

            if($bill_receive->settled == 1){
                $this->total_receive_current += $bill_receive->gross_value;
            }
        }

        foreach ($this->bills_pay as $bill_pay){
            $this->total_pay += $bill_pay->gross_value;

            if($bill_pay->settled == 1){
                $this->total_pay_current += $bill_pay->gross_value;
            }
        }

        $this->total_pay_x_receive_current = $this->total_receive_current - $this->total_pay_current;
        $this->total_pay_x_receive_foreseen = $this->total_receive - $this->total_pay;

    }

    public function balance()
    {
        return view('pages.financial.cash_flow.balance', [
            'total_pay_x_receive_current' => $this->total_pay_x_receive_current,
            'total_pay_x_receive_foreseen' => $this->total_pay_x_receive_foreseen,
            'bills_receive' =>  $this->bills_receive,
            'bills_pay' =>  $this->bills_pay,
            'total_receive' =>  $this->total_receive,
            'total_pay' =>  $this->total_pay,
        ]);
    }

    public function abstract()
    {
        return view('pages.financial.cash_flow.abstract', [
            'total_pay_x_receive_current' => $this->total_pay_x_receive_current,
            'total_pay_x_receive_foreseen' => $this->total_pay_x_receive_foreseen,
        ]);
    }

    public function cashier()
    {
        $actual_cash_balance = Cashier::all()->first();

        $cash_movements = CashMovement::with(['formPaymentCashMovements' => function($query){
                $query->where('form_payment_id', '=', 6);
            }], 'chartAccount')
            ->where('clearing_date', '=', date('Y-m-d'))
            ->get();

//        dd($cash_movements);



        return view('pages.financial.cash_flow.cashier', [
            'cash_movements' => $cash_movements,
            'actual_cash_balance' => $actual_cash_balance,
            'total_pay_x_receive_current' => $this->total_pay_x_receive_current,
            'total_pay_x_receive_foreseen' => $this->total_pay_x_receive_foreseen,
        ]);
    }
}
