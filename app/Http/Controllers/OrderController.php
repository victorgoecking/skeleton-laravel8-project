<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderService;
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
        $orders = Order::with('user', 'client', 'ordersProducts', 'ordersServices', 'situation')->get();

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

//        dd($request);

        $request->validate([
            'budget' => 'required|string|max:1',
//            'delivery_forecast' => 'required|date',
            'total_products' => 'required|string|max:255',
            'total_services' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            'client_id' => 'required|string|max:1',
            'salesman' => 'required|string|max:1',
            'situation_id' => 'required|string|max:1',
            'order_date' => 'required|date',
        ]);

        if($request->budget === "1") {
            $order = Order::create([
                'budget' => $request->budget,
                'total_products' => $request->total_products,
                'total_services' => $request->total_services,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'validity' => $request->validity,
                'note' => $request->note_order,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'salesman' => $request->salesman,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }else{
            $order = Order::create([
                'budget' => $request->budget,
                'total_products' => $request->total_products,
                'total_services' => $request->total_services,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'note' => $request->note_order,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'salesman' => $request->salesman,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }

        if($request->id_product){
            $countProducts = count($request->id_product);
            if($countProducts >= 1){

                for($iProduct = 0; $iProduct < $countProducts; $iProduct++){
                    if(trim($request->id_product[$iProduct] != '')){
                        OrderProduct::create([
                            'product_description_order' => $request->product_description_order[$iProduct],
                            'quantity' => $request->quantity_product[$iProduct],
                            'meter' => $request->meter[$iProduct],
                            'product_cost_value_when_order_placed' => $request->product_cost_value[$iProduct],
                            'sales_value_product_used_order' => $request->sales_value_product_used_order[$iProduct],
                            'discount_product' => $request->discount_product[$iProduct],
                            'order_product_subtotal' => $request->order_product_subtotal[$iProduct],
                            'product_id' => $request->id_product[$iProduct],
                            'order_id' => $order->id,
                        ]);
                    }
                }

            }
        }

        if($request->id_service){
            $countServices = count($request->id_service);
            if($countServices >= 1){

                for($iService = 0; $iService < $countServices; $iService++){
                    if(trim($request->id_service[$iService] != '')){
                        OrderService::create([
                            'service_description_order' => $request->service_description_order[$iService],
                            'service_cost_value_when_order_placed' => $request->service_cost_value[$iService],
                            'sales_value_service_used_order' => $request->sales_value_service_used_order[$iService],
                            'discount_service' => $request->discount_service[$iService],
                            'order_service_subtotal' => $request->order_service_subtotal[$iService],
                            'service_id' => $request->id_service[$iService],
                            'order_id' => $order->id,
                        ]);
                    }
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
        $order = Order::with('user', 'client', 'ordersProducts', 'ordersServices', 'situation')->find($order->id);

        $salesman =  User::where('id', $order->salesman)->first();

        $orders_products =  OrderProduct::with('product')->where('order_id', $order->id)->get();
        $orders_services =  OrderService::with('service')->where('order_id', $order->id)->get();


        return view('pages.order.order_detail', [
            'order' => $order,
            'salesman' => $salesman,
            'orders_products' => $orders_products,
            'orders_services' => $orders_services,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order = Order::with('user', 'client', 'ordersProducts', 'ordersServices', 'situation')->find($order->id);

        $salesman =  User::where('id', $order->salesman)->first();

        $orders_products =  OrderProduct::with('product')->where('order_id', $order->id)->get();
        $orders_services =  OrderService::with('service')->where('order_id', $order->id)->get();
        $orders_address = Address::where('id', $order->delivery_address_id)->first();

        $users = User::all();
        $clients = Client::with('address','contact')->get();
        $addresses = Client::with('address')->where('id', $order->client_id)->get();

//        dd($address->first()->address);
        $products = Product::all();
        $services = Service::all();
        $situation = Situation::all();


//        dd( $order->order_date->format('d/m/Y'));
//        dd(  $order->total_products);

        return view('pages.order.order_edit', [
            'order' => $order,
            'salesman' => $salesman,
            'orders_products' => $orders_products,
            'orders_services' => $orders_services,
            'orders_address' => $orders_address,
            'users' => $users,
            'clients' => $clients,
            'addresses' => $addresses,
            'products' => $products,
            'services' => $services,
            'situations' => $situation,

        ]);
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
        $request->validate([
            'budget' => 'required|string|max:1',
//            'delivery_forecast' => 'required|date',
            'total_products' => 'required|string|max:255',
            'total_services' => 'required|string|max:255',
            'total' => 'required|string|max:255',
            'client_id' => 'required|string|max:1',
            'salesman' => 'required|string|max:1',
            'situation_id' => 'required|string|max:1',
            'order_date' => 'required|date',
        ]);

//        dd($request->id_order_product_removed);

        if($request->budget === "1") {
            $order->update([
                'budget' => $request->budget,
                'total_products' => $request->total_products,
                'total_services' => $request->total_services,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'validity' => $request->validity,
                'note' => $request->note_order,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'salesman' => $request->salesman,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }else{
            $order->update([
                'budget' => $request->budget,
                'total_products' => $request->total_products,
                'total_services' => $request->total_services,
                'total' => $request->total,
                'cash_discount' => $request->total_cash_discount,
                'percentage_discount' => $request->total_percentage_discount,
                'cost_freight' => $request->cost_freight,
                'delivery_address_id' => $request->delivery_address_id,
                'order_date' => $request->order_date,
                'delivery_forecast' => $request->delivery_forecast,
                'note' => $request->note_order,
                'internal_note' => $request->internal_note,
                'client_id' => $request->client_id,
                'salesman' => $request->salesman,
                'user_id' => auth()->user()->id,
                'situation_id' => $request->situation_id,
            ]);
        }

        if($request->id_order_product){
            $countOrderProduct = count($request->id_order_product);
            if($countOrderProduct >= 1){

                for($iOrderProduct = 0; $iOrderProduct < $countOrderProduct; $iOrderProduct++){
                    if(isset($request->id_order_product_removed)){

                        foreach ($request->id_order_product_removed as $removeOrderProduct){
                            OrderProduct::where('id', $removeOrderProduct)->where('order_id', $order->id)->delete();
                        }

                    }else if(isset($request->id_order_product[$iOrderProduct])){
                        OrderProduct::where('id', $request->id_order_product[$iOrderProduct])->where('order_id', $order->id)->update([
                            'product_description_order' => $request->product_description_order[$iOrderProduct],
                            'quantity' => $request->quantity_product[$iOrderProduct],
                            'meter' => $request->meter[$iOrderProduct],
                            'product_cost_value_when_order_placed' => $request->product_cost_value[$iOrderProduct],
                            'sales_value_product_used_order' => $request->sales_value_product_used_order[$iOrderProduct],
                            'discount_product' => $request->discount_product[$iOrderProduct],
                            'order_product_subtotal' => $request->order_product_subtotal[$iOrderProduct],
                            'product_id' => $request->id_product[$iOrderProduct],
                            'order_id' => $order->id,
                        ]);
                    }else{
                        OrderProduct::create([
                            'product_description_order' => $request->product_description_order[$iOrderProduct],
                            'quantity' => $request->quantity_product[$iOrderProduct],
                            'meter' => $request->meter[$iOrderProduct],
                            'product_cost_value_when_order_placed' => $request->product_cost_value[$iOrderProduct],
                            'sales_value_product_used_order' => $request->sales_value_product_used_order[$iOrderProduct],
                            'discount_product' => $request->discount_product[$iOrderProduct],
                            'order_product_subtotal' => $request->order_product_subtotal[$iOrderProduct],
                            'product_id' => $request->id_product[$iOrderProduct],
                            'order_id' => $order->id,
                        ]);
                    }
                }

            }
        }

        if($request->id_order_service){
            $countOrderServices = count($request->id_order_service);
            if($countOrderServices >= 1){

                for($iOrderService = 0; $iOrderService < $countOrderServices; $iOrderService++){
                    if(isset($request->id_order_service_removed)){

                        foreach ($request->id_order_service_removed as $removeOrderService){
                            OrderService::where('id', $removeOrderService)->where('order_id', $order->id)->delete();
                        }

                    }
                    if(isset($request->id_order_service[$iOrderService])){
                        OrderService::where('id', $request->id_order_service[$iOrderService])->where('order_id', $order->id)->update([
                            'service_description_order' => $request->service_description_order[$iOrderService],
                            'service_cost_value_when_order_placed' => $request->service_cost_value[$iOrderService],
                            'sales_value_service_used_order' => $request->sales_value_service_used_order[$iOrderService],
                            'discount_service' => $request->discount_service[$iOrderService],
                            'order_service_subtotal' => $request->order_service_subtotal[$iOrderService],
//                            'service_id' => $request->id_service[$iOrderService],
//                            'order_id' => $order->id,
                        ]);
                    }else{
                        OrderService::create([
                            'service_description_order' => $request->service_description_order[$iOrderService],
                            'service_cost_value_when_order_placed' => $request->service_cost_value[$iOrderService],
                            'sales_value_service_used_order' => $request->sales_value_service_used_order[$iOrderService],
                            'discount_service' => $request->discount_service[$iOrderService],
                            'order_service_subtotal' => $request->order_service_subtotal[$iOrderService],
                            'service_id' => $request->id_service[$iOrderService],
                            'order_id' => $order->id,
                        ]);
                    }
                }

            }
        }

        return redirect()->route('order.index')->with('success','Pedido atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

        $orders_products = OrderProduct::where('order_id', $order->id)->get();
        $orders_services = OrderService::where('order_id', $order->id)->get();

        if($orders_products){
            foreach ($orders_products as $order_product) {
                $order_product->delete();
            }
        }
        if($orders_services){
            foreach ($orders_services as $order_service) {
                $order_service->delete();
            }
        }

        $order->delete();

        return redirect()->route('order.index')->with('success','Pedido removido com sucesso!');
    }
}
