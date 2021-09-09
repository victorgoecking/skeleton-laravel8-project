<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $array = Client::all();
//        foreach ($array as $item){
//            $clients = Client::with('address')->find($item->id);
//
//            echo '<h3>'.$clients->name.'</h3>';
////                echo $clients->address->first()->public_place.'</br>';
//
//            foreach ($clients->address as $address){
//                echo $address->public_place.'</br>';
//            }
//        }
//
        $clients = Client::with('address','contact','user')->get();

        return view('pages.client.clients', [
            'clients' => $clients
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.client.client_registration');
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
            'person_type' => 'required|string|max:2',
            'cpf' => 'max:14',
            'cnpj' => 'max:18',
        ]);

        if($request->person_type === 'PF') {
            $client = Client::create([
                'name' => $request->name,
                'person_type' => $request->person_type,
                'cpf' => $request->cpf,
                'sex' => $request->sex,
                'birth_date' => $request->birth_date,
                'note' => $request->note_client,
                'user_id' => auth()->user()->id,
            ]);
        }else{
            $client = Client::create([
                'name' => $request->name,
                'person_type' => $request->person_type,
                'cnpj' => $request->cnpj,
                'corporate_reason' => $request->corporate_reason,
                'fantasy_name' => $request->fantasy_name,
                'note' => $request->note_client,
                'user_id' => auth()->user()->id,
            ]);
        }

        $countAddress = count($request->public_place);
        if($countAddress >= 1){

            for($iAddress = 0; $iAddress < $countAddress; $iAddress++){
                if(trim($request->public_place[$iAddress] != '')){
                    Address::create([
                        'cep' => $request->cep[$iAddress],
                        'public_place' => $request->public_place[$iAddress],
                        'number' => $request->number[$iAddress],
                        'district' => $request->district[$iAddress],
                        'state' => $request->state[$iAddress],
                        'city' => $request->city[$iAddress],
                        'uf' => $request->uf[$iAddress],
                        'complement' => $request->complement[$iAddress],
                        'note' => $request->note_address[$iAddress],
                        'client_id' => $client->id,
                    ]);
                }
            }

        }

        $countContact = count($request->cell_phone);
        if($countContact >= 1){
            for($iContact = 0; $iContact < $countContact; $iContact++){
                if(trim($request->email[$iContact] != '' || $request->phone[$iContact] != '' || $request->cell_phone[$iContact] != '' || $request->whatsapp[$iContact] != '' || $request->note_contact[$iContact] != '')){
                    Contact::create([
                        'email' => $request->email[$iContact],
                        'phone' => $request->phone[$iContact],
                        'cell_phone' => $request->cell_phone[$iContact],
                        'whatsapp' => $request->whatsapp[$iContact],
                        'note' => $request->note_contact[$iContact],
                        'client_id' => $client->id,
                    ]);
                }
            }
        }

        return redirect()->route('client.index')->with('success','Cliente cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $client = Client::with('address','contact','user')->find($client->id);

        return view('pages.client.client_detail', [
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client = Client::with('address','contact','user')->find($client->id);

        return view('pages.client.client_edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'person_type' => 'required|string|max:2',
            'cpf' => 'max:14',
            'cnpj' => 'max:18',
        ]);

//        dd($request->all());
//        echo'<pre>';
//        dd(Contact::where('id', $request->contact_id)->where('client_id',$client->id)->get());
//        exit;
//        $client->find($request->client->id)->update($request->all());
//
//
//
//        $client->contact()->update(['client_id' => $client->id]);

//        dd($client->contact()->associate($request->client->id));
//        dd($client->find($client->id));

        if($request->person_type === 'PF') {
            $client->update([
                'name' => $request->name,
                'person_type' => $request->person_type,
                'cpf' => $request->cpf,
                'sex' => $request->sex,
                'birth_date' => $request->birth_date,
                'note' => $request->note_client,
            ]);
        }else{
            $client->update([
                'name' => $request->name,
                'person_type' => $request->person_type,
                'cnpj' => $request->cnpj,
                'corporate_reason' => $request->corporate_reason,
                'fantasy_name' => $request->fantasy_name,
                'note' => $request->note_client,
            ]);
        }
//
//        $countAddress = count($request->public_place);
//        if($countAddress >= 1){
//
//            for($iAddress = 0; $iAddress < $countAddress; $iAddress++){
//                if(trim($request->public_place[$iAddress] != '')){
//                    Address::update([
//                        'cep' => $request->cep[$iAddress],
//                        'public_place' => $request->public_place[$iAddress],
//                        'number' => $request->number[$iAddress],
//                        'district' => $request->district[$iAddress],
//                        'state' => $request->state[$iAddress],
//                        'city' => $request->city[$iAddress],
//                        'uf' => $request->uf[$iAddress],
//                        'complement' => $request->complement[$iAddress],
//                        'note' => $request->note_address[$iAddress],
//                        'client_id' => $client->id,
//                    ]);
//                }
//            }
//
//        }
//        dd(count($request->cell_phone));

//        dd($request->client->contacts());
//        if(!isset($request->contact_id) && (isset($request->email[$iContact]) || isset($request->phone[$iContact]) || isset($request->cell_phone[$iContact]) || isset($request->whatsapp[$iContact]) || isset($request->note_contact[$iContact]))){
//
//        }



        $countContact = count($request->countContactForDelete);
        if($countContact >= 1){
            for($iContact = 0; $iContact < $countContact; $iContact++){
                if(isset($request->contact_id[$iContact]) && (!isset($request->email[$iContact]) && !isset($request->phone[$iContact]) && !isset($request->cell_phone[$iContact]) && !isset($request->whatsapp[$iContact]) && !isset($request->note_contact[$iContact]))){
                    //DELETE
                    Contact::where('id', $request->contact_id[$iContact])->where('client_id',$client->id)->delete();

                }else if(isset($request->contact_id[$iContact])){
                    //UPDATE
                    Contact::where('id', $request->contact_id[$iContact])->where('client_id',$client->id)->update([
                        'email' => $request->email[$iContact],
                        'phone' => $request->phone[$iContact],
                        'cell_phone' => $request->cell_phone[$iContact],
                        'whatsapp' => $request->whatsapp[$iContact],
                        'note' => $request->note_contact[$iContact],
                    ]);
                }else{
                    //CREATE
                    if(isset($request->email[$iContact]) || isset($request->phone[$iContact]) || isset($request->cell_phone[$iContact]) || isset($request->whatsapp[$iContact]) || isset($request->note_contact[$iContact])){
                        Contact::create([
                            'email' => $request->email[$iContact],
                            'phone' => $request->phone[$iContact],
                            'cell_phone' => $request->cell_phone[$iContact],
                            'whatsapp' => $request->whatsapp[$iContact],
                            'note' => $request->note_contact[$iContact],
                            'client_id' => $client->id,
                        ]);
                    }

                }
            }
        }

        return redirect()->route('client.index')->with('success','Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('success','Cliente removido com sucesso!');
    }
}
