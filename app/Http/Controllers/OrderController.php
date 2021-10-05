<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrdersProducts;
use App\Models\Product;
use App\Models\Service;
use App\Models\Situation;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user', 'client', 'products')->get();

        return view('pages.order.orders', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $order = Order::with('user', 'client', 'products')->get();

        $users = User::all();
        $clients = Client::with('address','contact')->get();
        $products = Product::all();
        $services = Service::all();
        $situation = Situation::all();

//        dd($clients);

        return view('pages.order.order_registration', [
            'users' => $users,
            'clients' => $clients,
            'products' => $products,
            'services' => $services,
            'situations' => $situation,

        ]);
    }

    public function returnClientAddress(Request $request)
    {
        return Address::where('client_id', '=', $request->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'budget' => 'required|string|max:1',
            'delivery_forecast' => 'required|date',
//            'total' => 'required|string|max:255',
            'client_id' => 'required|string|max:1',
            'user_id' => 'required|string|max:1',
            'situation_id' => 'required|string|max:1',
            'order_date' => 'required|date',
        ]);

        if($request->budget === "1") {
            $order = Order::create([
                'budget' => $request->budget,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'validity' => $request->validity,
                'note' => $request->note,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }else{
            $order = Order::create([
                'budget' => $request->budget,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'note' => $request->note,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }

        $countProducts = count($request->id_product);
        if($countProducts >= 1){

            for($iProduct = 0; $iProduct < $countProducts; $iProduct++){
                if(trim($request->id_product[$iProduct] != '')){
                    OrdersProducts::create([
                        'product_description_order' => $request->product_description_order[$iProduct],
                        'quantity' => $request->quantity_product[$iProduct],
                        'meter' => $request->meter[$iProduct],
                        'order_product_subtotal' => $request->order_product_subtotal[$iProduct],
                        'discount_product' => $request->discount_product[$iProduct],
                        'product_cost_value_when_order_placed' => $request->product_cost_value[$iProduct],
                        'sales_value_product_used_order' => $request->sales_value_product_used_order[$iProduct],
                        'order_id' => $request->order_id[$iProduct],
                        'product_id' => $request->product_id[$iProduct],
                    ]);
                }
            }

        }

        return redirect()->route('order.index')->with('success','Pedido cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
