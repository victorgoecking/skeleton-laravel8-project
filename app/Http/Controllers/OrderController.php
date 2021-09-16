<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return view('pages.order.order_registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'budget' => 'required|tinyint',
//            'total' => 'required|string|max:255',
//        ]);
//
//        $order = Order::create([
//            'budget' => $request->budget,
//            'total' => $request->total,
//            'discount' => $request->discount,
//            'cost_freight' => $request->cost_freight,
//            'delivery_address_id' => $request->delivery_address_id,
//            'order_date' => $request->order_date,
//            'delivery_forecast' => $request->delivery_forecast,
//            'validity' => $request->validity,
//            'note' => $request->note,
//            'internal_note' => $request->internal_note,
//            'client_id' => $request->client->id,
//            'user_id' => auth()->user()->id,
//        ]);
//
//        return redirect()->route('order.index')->with('success','Pedido cadastrado com sucesso!');
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
