<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $address = Address::with('client')->get();

        dd($address);

        return view('pages........', [
            'address' => $address
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'public_place' => 'required|string|max:255',
            'city' => 'required',
        ]);

        $address = '';
        if(trim($request->public_place != '')){
            $address = Address::create([
                'cep' => $request->cep,
                'public_place' => $request->public_place,
                'number' => $request->number,
                'district' => $request->district,
                'city_id' => $request->city,
                'complement' => $request->complement,
                'note' => $request->note_address,
                'client_id' => $request->id_client,
            ]);
        }

        session(['success' => 'Endereço cadastrado com sucesso!']);
//        return redirect()->route('order.create')->with('success','Endereço cadastrado com sucesso!');
        return $address;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
