<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('user')->get();

        return view('pages.service.services', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.service.service_registration');
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
            'name' => 'required|string|max:255',
            'service_cost_value' => 'required|string|max:255',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'service_cost_value' => $request->service_cost_value,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('service.index')->with('success','Serviço cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service = Service::with('user')->find($service->id);

        return view('pages.service.service_detail', [
            'service' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::with('user')->find($service->id);

        return view('pages.service.service_edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'service_cost_value' => 'required|string|max:255',
        ]);

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'service_cost_value' => $request->service_cost_value,
        ]);

        return redirect()->route('service.index')->with('success','service atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')->with('success','service removido com sucesso!');
    }
}
