<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use Illuminate\Http\Request;

class ChartAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart_accounts = ChartAccount::orderBy('description')->get();

        return view('pages.chart_accounts.chart_accounts', [
            'chart_accounts' => $chart_accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.chart_accounts.chart_account_registration');
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
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        ChartAccount::create([
            'type' => $request->type,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

//        return redirect('/cadastro-usuario')->with('message', 'Profile updated!');
        return redirect()->route('chart-account.index')->with('success','Plano de conta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartAccount $chartAccount)
    {
        return view('pages.chart_accounts.chart_account_detail', [
            'chart_account' => $chartAccount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartAccount $chartAccount)
    {
        return view('pages.chart_accounts.chart_account_edit', [
            'chart_account' => $chartAccount
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChartAccount $chartAccount)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if(!empty($request->description)){
            $chartAccount->update([
                'type' => $request->type,
                'description' => $request->description,
                'user_id' => auth()->user()->id,
            ]);
        }

//        return redirect('/cadastro-usuario')->with('message', 'Profile updated!');
        return redirect()->route('chart-account.index')->with('success','Plano de conta atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartAccount $chartAccount)
    {
        $chartAccount->delete();

        return redirect()->route('chart-account')->with('success','Plano de conta removido com sucesso!');
    }
}
