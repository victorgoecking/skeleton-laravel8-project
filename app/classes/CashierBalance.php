<?php

namespace App\classes;

use App\Models\Cashier;

class CashierBalance{


    public function updateBalance($type_movement, $form_payment_cash_movement){

        $cashier = Cashier::where('id', 1)->first();
        if(!empty($form_payment_cash_movement->value) &&
            $form_payment_cash_movement->paid == '1' &&
            $form_payment_cash_movement->form_payment_id == '6'
        ){

            $total = 0.00;

            if($type_movement === "receber"){
                $total = $cashier->balance + $form_payment_cash_movement->value;

            }else if($type_movement === "pagar"){
                $total = $cashier->balance - $form_payment_cash_movement->value;
            }

            $cashier->update([
                'balance' => $total,
            ]);
        }


        return $cashier;
    }

}
