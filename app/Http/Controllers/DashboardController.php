<?php

namespace App\Http\Controllers;

use App\Models\CashMovement;
use App\Models\Client;
use App\Models\FormPaymentCashMovements;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->count_products = count(Product::all());
        $this->count_clients = count(Client::all());
        $this->count_sales = count(Order::where('budget', '=', '0')->get());
        $this->annual_receipt = CashMovement::where('type_movement', 'receber')->where('settled', '1')->whereYear('clearing_date', '=', date('Y'))->sum('gross_value');
        $this->monthly_receipt = CashMovement::where('type_movement', 'receber')->where('settled', '1')->whereYear('clearing_date', '=', date('Y'))->whereMonth('clearing_date', '=', date('m'))->sum('gross_value');


//        GRAFICO
        $this->form_payment_cash_movements_annual_receipt = FormPaymentCashMovements::with('formPayments')->whereHas('cashMovement', function ($query){
                return $query->where('type_movement', '=', 'receber');
            })->where('paid', '=', '1')
            ->whereYear('created_at', '=', date('Y'))
            ->get()
            ->groupBy('form_payment_id');

        $this->form_payment_receipt_description = array();
        $this->form_payment_receipt_count = array();
        $this->form_payment_receipt_color = [
            "#836FFF",
            "#48D1CC",
            "#D2691E",
            "#BA55D3",
            "#DC143C",
            "#FFD700",
            "#191970",
            "#00FA9A",
            "#C71585",
            "#FF8C00"
        ];
        $this->form_payment_receipt_color_name = [
            "custom-graphic-SlateBlue",
            "custom-graphic-MediumTurquoise",
            "custom-graphic-Chocolate",
            "custom-graphic-MediumOrchid",
            "custom-graphic-Crimson",
            "custom-graphic-Gold",
            "custom-graphic-MidnightBlue",
            "custom-graphic-MediumSpringGreen",
            "custom-graphic-MediumVioletRed",
            "custom-graphic-DarkOrange"
        ];

        foreach ($this->form_payment_cash_movements_annual_receipt as $fpcmar){

            $count_fp = count($fpcmar);
            $description_fp = $fpcmar->first()->formPayments->description;

            array_push($this->form_payment_receipt_description, $description_fp);
            array_push($this->form_payment_receipt_count, $count_fp);

        }
    }

//    public function pieChart(){
//        $this->form_payment_cash_movements_annual_receipt = FormPaymentCashMovements::with('formPayments')->whereHas('cashMovement', function ($query){
//            return $query->where('type_movement', '=', 'receber');
//        })->where('paid', '=', '1')
//            ->whereYear('created_at', '=', date('Y'))
//            ->get()
//            ->groupBy('form_payment_id');
//
//        $this->form_payment_receipt_description = array();
//        $this->form_payment_receipt_count = array();
//        $this->form_payment_receipt_color = array();
//
//
//        $response = array();
//        foreach ($this->form_payment_cash_movements_annual_receipt as $fpcmar){
//
//            $count_fp = count($fpcmar);
//            $description_fp = $fpcmar->first()->formPayments->description;
//
//            array_push($this->form_payment_receipt_description, $description_fp);
//            array_push($this->form_payment_receipt_count, $count_fp);
//
//            array_push($response, [$description_fp=>$count_fp]);
//
//        }
//
//        dd($response);
//        return $response;
//    }

    public function dashboard()
    {
        return view('dashboard', [
            'count_products' => $this->count_products,
            'count_clients' => $this->count_clients,
            'count_sales' => $this->count_sales,
            'annual_receipt' => $this->annual_receipt,
            'monthly_receipt' => $this->monthly_receipt,
            'form_payment_receipt_description' => $this->form_payment_receipt_description,
            'form_payment_receipt_count' => $this->form_payment_receipt_count,
            'form_payment_receipt_color' => $this->form_payment_receipt_color,
            'form_payment_receipt_color_name' => $this->form_payment_receipt_color_name,
        ]);
    }
}
