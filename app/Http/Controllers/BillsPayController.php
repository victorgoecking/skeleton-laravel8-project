<?php

namespace App\Http\Controllers;

use App\classes\CashierBalance;
use App\Models\CashMovement;
use App\Models\ChartAccount;
use App\Models\FormPayment;
use App\Models\FormPaymentCashMovements;
use Illuminate\Http\Request;

class BillsPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills_pay = CashMovement::with('user', 'formPaymentCashMovements')->where('type_movement', 'pagar')->get();

        return view('pages.financial.bills_pay.bills_pay', [
            'bills_pay' => $bills_pay,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_payments = FormPayment::all();
        $chart_accounts = ChartAccount::orderBy('name')->get();

        return view('pages.financial.bills_pay.bills_pay_registration', [
            'form_payments' => $form_payments,
            'chart_accounts' => $chart_accounts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->form_payment){
            return back()->with('error','Forma de pagamento obrigatória!');
        }

        $request->validate([
            'type_movement' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'gross_value' => 'required|string|max:255',
            'settled' => 'required',
            'due_date' => 'required|date',
            'form_payment' => 'required',
            'value_form_payment' => 'required|max:255',
            'settled_form_payment' => 'required',
        ]);


        if($request->clearing_date){
            if($request->settled == '1'){
                $situation = 'Confirmado';
            }else if($request->due_date < $request->clearing_date && $request->settled == '0'){
                $situation = 'Atrasado';

            }else if($request->due_date >= $request->clearing_date && $request->settled == '0'){
                $situation = 'Em aberto';
            }

        }else if($request->due_date < date('Y-m-d', time()) ){
            $situation = 'Atrasado';
        }else{
            $situation = 'Em aberto';
        }


        if($request->type_movement){
           $bill_pay = CashMovement::create([
                'type_movement' => $request->type_movement,
                'description' => $request->description,
                'gross_value' => $request->gross_value,
                'settled' => $request->settled,
                'due_date' => $request->due_date,
                'clearing_date' => $request->clearing_date,
                'situation' => $situation,
                'note' => $request->note,
                'user_id' => auth()->user()->id,
                'cashier_id' => 1,
                'chart_accounts_id' => $request->chart_accounts_id
            ]);
        }


        if($request->form_payment){
            $count_form_payment = count($request->form_payment);

            if($count_form_payment >= 1){
                for($i_form_payment = 0; $i_form_payment < $count_form_payment; $i_form_payment++){

                    if(trim($request->form_payment != '')){
                        $form_payment_cash_movement = FormPaymentCashMovements::create([
                            'value' => $request->value_form_payment[$i_form_payment],
                            'paid' => $request->settled_form_payment[$i_form_payment],
                            'note' => $request->note_form_payment[$i_form_payment],
                            'form_payment_id' => $request->form_payment[$i_form_payment],
                            'cash_movement_id' => $bill_pay->id,
                        ]);

//                       Realizando update no caixa
                        $cashier_update = new CashierBalance();
                        $cashier_update->updateBalance($request->type_movement, $form_payment_cash_movement);

                    }
                }

            }
        }

        return redirect()->route('bills-pay.index')->with('success','Conta a pagar cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
//     * @param  \App\Models\CashMovement  $cashMovement
//     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill_pay = CashMovement::with('user', 'formPaymentCashMovements')->where('type_movement', 'pagar')->where('id', '=', $id)->first();


        $form_payment_cash_movements = FormPaymentCashMovements::with('formPayments')->where('cash_movement_id', $bill_pay->id)->get();

        return view('pages.financial.bills_pay.bills_pay_detail', [
            'bill_pay' => $bill_pay,
            'form_payment_cash_movements' => $form_payment_cash_movements,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
//     * @param  \App\Models\CashMovement  $cashMovement
//     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill_pay = CashMovement::with('user', 'formPaymentCashMovements', 'chartAccount')->where('type_movement', 'pagar')->where('id', '=', $id)->first();

        $form_payment_cash_movements = FormPaymentCashMovements::with('formPayments')->where('cash_movement_id', $bill_pay->id)->get();

        $form_payments = FormPayment::all();

        $chart_accounts = ChartAccount::orderBy('name')->get();

        return view('pages.financial.bills_pay.bills_pay_edit', [
            'bill_pay' => $bill_pay,
            'form_payment_cash_movements' => $form_payment_cash_movements,
            'form_payments' => $form_payments,
            'chart_accounts' => $chart_accounts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\CashMovement  $cashMovement
//     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->id_payment_movement){
            return back()->with('error','Forma de pagamento obrigatória!');
        }

        $request->validate([
            'type_movement' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'gross_value' => 'required|string|max:255',
            'settled' => 'required',
            'due_date' => 'required|date',
            'form_payment' => 'required',
            'value_form_payment' => 'required|max:255',
            'settled_form_payment' => 'required',
        ]);

        if($request->clearing_date){
            if($request->settled == '1'){
                $situation = 'Confirmado';
            }else if($request->due_date < $request->clearing_date && $request->settled == '0'){
                $situation = 'Atrasado';

            }else if($request->due_date >= $request->clearing_date && $request->settled == '0'){
                $situation = 'Em aberto';
            }

        }else if($request->due_date < date('Y-m-d', time()) ){
            $situation = 'Atrasado';
        }else{
            $situation = 'Em aberto';
        }


        if($request->type_movement){
            $bill_pay = CashMovement::where('type_movement', 'pagar')->where('id', '=', $id)->first();

            $bill_pay->update([
                'type_movement' => $request->type_movement,
                'description' => $request->description,
                'gross_value' => $request->gross_value,
                'settled' => $request->settled,
                'due_date' => $request->due_date,
                'clearing_date' => $request->clearing_date,
                'situation' => $situation,
                'note' => $request->note,
                'user_id' => auth()->user()->id,
                'cashier_id' => 1,
                'chart_accounts_id' => $request->chart_accounts_id
            ]);
        }

        if($request->id_payment_movement){
            $count_form_payment = count($request->id_payment_movement);

            if($count_form_payment >= 1){
                for($i_form_payment = 0; $i_form_payment < $count_form_payment; $i_form_payment++){

                    if(isset($request->id_payment_movement_removed)){
                        foreach ($request->id_payment_movement_removed as $remove_payment_movement){
                            $form_payment_cash_movement = FormPaymentCashMovements::where('id', $remove_payment_movement)->where('cash_movement_id', $bill_pay->id);

//                          Realizando update no caixa
                            if($form_payment_cash_movement->form_payment_id == '6' && $form_payment_cash_movement->paid == '1'){
                                $cashier_update = new CashierBalance();
                                $cashier_update->updateBalance('pagar', $form_payment_cash_movement);
                            }

                            $form_payment_cash_movement->delete();
                        }
                    }
                    if(isset($request->id_payment_movement[$i_form_payment])){
                        $form_payment_cash_movement = FormPaymentCashMovements::where('id', $request->id_payment_movement[$i_form_payment])->where('cash_movement_id', $bill_pay->id);

//                      Realizando update no caixa
                        $value_atual = $form_payment_cash_movement->value;
                        $value_current = $request->value_form_payment[$i_form_payment];
                        $paid = $form_payment_cash_movement->paid;

                        if($value_atual != $value_current && $paid == '1'){
                            $new_value = 0.00;
                            $type = 'pagar';

                            if($value_atual > $value_current){
                                $new_value = $value_atual - $value_current;
                                $type = 'receber';

                            }else if($value_atual < $value_current){
                                $new_value = $value_current - $value_atual;
                            }
                            $data = [
                                'value' => $new_value,
                                'paid' => $paid,
                            ];

                            $cashier_update = new CashierBalance();
                            $cashier_update->updateBalance($type, $data);

                        }

                        $form_payment_cash_movement->update([
                            'value' => $request->value_form_payment[$i_form_payment],
                            'paid' => $request->settled_form_payment[$i_form_payment],
                            'note' => $request->note_form_payment[$i_form_payment],
//                            'form_payment_id' => $request->form_payment[$i_form_payment],
//                            'cash_movement_id' => $bill_pay->id,
                        ]);
                    }else{
                        $form_payment_cash_movement = FormPaymentCashMovements::create([
                            'value' => $request->value_form_payment[$i_form_payment],
                            'paid' => $request->settled_form_payment[$i_form_payment],
                            'note' => $request->note_form_payment[$i_form_payment],
                            'form_payment_id' => $request->form_payment[$i_form_payment],
                            'cash_movement_id' => $bill_pay->id,
                        ]);

//                      Realizando update no caixa
                        $cashier_update = new CashierBalance();
                        $cashier_update->updateBalance($request->type_movement, $form_payment_cash_movement);
                    }
                }

            }
        }

        return redirect()->route('bills-pay.index')->with('success','Conta a pagar atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
//     * @param  \App\Models\CashMovement  $cashMovement
//     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill_pay = CashMovement::with('user', 'formPaymentCashMovements')->where('type_movement', 'pagar')->where('id', '=', $id)->first();

        $form_payment_cash_movements = FormPaymentCashMovements::with('formPayments')->where('cash_movement_id', $bill_pay->id)->get();
        if($form_payment_cash_movements){
            foreach ($form_payment_cash_movements as $form_payment_cash_movement){
                $form_payment_cash_movement->delete();
            }
        }

        $bill_pay->delete();

        return redirect()->route('bills-pay.index')->with('success','Conta a pagar removida com sucesso!');
    }
}
