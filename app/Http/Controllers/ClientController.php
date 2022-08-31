<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        if($request->cpf){
            $request->validate([
                'cpf' => 'max:14|unique:clients'
            ]);
        }else if($request->cnpj){
            $request->validate([
                'cnpj' => 'max:18|unique:clients'
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'person_type' => 'required|string|max:2'
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
                        'city_id' => $request->city[$iAddress],
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
        if($request->cpf){
            $request->validate([
                'cpf' => 'max:14|unique:clients,cpf,'.$request->id
            ]);
        }else if($request->cnpj){
            $request->validate([
                'cnpj' => 'max:18|unique:clients,cnpj,'.$request->id
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'person_type' => 'required|string|max:2',
        ]);

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

//        UPDATE ENDERECO
        $countAddress =  isset($request->countAddressForDelete) ? count($request->countAddressForDelete) : 0;
        if($countAddress >= 1){
            for($iAddress = 0; $iAddress < $countAddress; $iAddress++){
                if(isset($request->contact_id[$iAddress]) &&
                    (!isset($request->cep[$iAddress]) &&
                        !isset($request->public_place[$iAddress]) &&
                        !isset($request->number[$iAddress]) &&
                        !isset($request->district[$iAddress]) &&
                        !isset($request->city[$iAddress]) &&
                        !isset($request->complement[$iAddress]) &&
                        !isset($request->note_address[$iAddress]))
                ){
                    //DELETE
                    Address::where('id', $request->address_id[$iAddress])->where('client_id',$client->id)->delete();

                }else if(isset($request->address_id[$iAddress])){
                    //UPDATE
                    Address::where('id', $request->address_id[$iAddress])->where('client_id',$client->id)->update([
                        'cep' => $request->cep[$iAddress],
                        'public_place' => $request->public_place[$iAddress],
                        'number' => $request->number[$iAddress],
                        'district' => $request->district[$iAddress],
                        'city_id' => $request->city[$iAddress],
                        'complement' => $request->complement[$iAddress],
                        'note' => $request->note_address[$iAddress],
                    ]);
                }else{
                    //CREATE
                    if(isset($request->cep[$iAddress]) ||
                        isset($request->public_place[$iAddress]) ||
                        isset($request->number[$iAddress]) ||
                        isset($request->district[$iAddress]) ||
                        isset($request->city[$iAddress]) ||
                        isset($request->complement[$iAddress]) ||
                        isset($request->note_address[$iAddress])
                    ){
                        Address::create([
                            'cep' => $request->cep[$iAddress],
                            'public_place' => $request->public_place[$iAddress],
                            'number' => $request->number[$iAddress],
                            'district' => $request->district[$iAddress],
                            'city_id' => $request->city[$iAddress],
                            'complement' => $request->complement[$iAddress],
                            'note' => $request->note_address[$iAddress],
                            'client_id' => $client->id,
                        ]);
                    }

                }
            }
        }

//        UPDATE CONTATO
        $countContact =  isset($request->countContactForDelete) ? count($request->countContactForDelete) : 0;
        if($countContact >= 1){
            for($iContact = 0; $iContact < $countContact; $iContact++){
                if(isset($request->contact_id[$iContact]) &&
                    (!isset($request->email[$iContact]) &&
                        !isset($request->phone[$iContact]) &&
                        !isset($request->cell_phone[$iContact]) &&
                        !isset($request->whatsapp[$iContact]) &&
                        !isset($request->note_contact[$iContact]))
                ){
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
                    if(isset($request->email[$iContact]) ||
                        isset($request->phone[$iContact]) ||
                        isset($request->cell_phone[$iContact]) ||
                        isset($request->whatsapp[$iContact]) ||
                        isset($request->note_contact[$iContact])
                    ){
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

        if ($client->has('address')) {
            foreach ($client->address as $address) {
                $address->delete();
            }
        }

        if ($client->has('contact')) {
            foreach ($client->contact as $contact) {
                $contact->delete();
            }
        }

        $client->delete();

        return redirect()->route('client.index')->with('success','Cliente removido com sucesso!');
    }
}
