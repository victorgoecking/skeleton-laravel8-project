<?php

namespace App\Http\Controllers;

use App\Models\CashMovement;
use Illuminate\Http\Request;

class BillsReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bills_receive.bills_receive_registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashMovement  $cashMovement
     * @return \Illuminate\Http\Response
     */
    public function show(CashMovement $cashMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashMovement  $cashMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(CashMovement $cashMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashMovement  $cashMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashMovement $cashMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashMovement  $cashMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashMovement $cashMovement)
    {
        //
    }
}
