<?php

namespace App\Http\Controllers;

use App\Models\CashMovement;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->products = Product::all();
        $this->sales = Order::where('budget', '=', '0')->get();
        $this->annual_receipt = CashMovement::where('type_movement', 'receber')->where('settled', '1')->whereYear('clearing_date', '=', date('Y'))->sum('gross_value');
        $this->monthly_receipt = CashMovement::where('type_movement', 'receber')->where('settled', '1')->whereYear('clearing_date', '=', date('Y'))->whereMonth('clearing_date', '=', date('m'))->sum('gross_value');

        $this->count_products = count($this->products);
        $this->count_sales = count($this->sales);

//        dd($this->monthly_receipt);
    }

    public function dashboard()
    {
        return view('dashboard', [
            'count_products' => $this->count_products,
            'count_sales' => $this->count_sales,
            'annual_receipt' => $this->annual_receipt,
            'monthly_receipt' => $this->monthly_receipt,
        ]);
    }
}
