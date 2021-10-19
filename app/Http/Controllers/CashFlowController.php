<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashFlowController extends Controller
{

    public function balance()
    {
//        $form_payments = FormPayment::all();

//        return view('pages.bills_receive.bills_receive_registration', [
//            'form_payments' => $form_payments,
//        ]);

        return view('pages.cash_flow.balance');
    }

    public function abstract()
    {
        return view('pages.cash_flow.abstract');
    }
}
