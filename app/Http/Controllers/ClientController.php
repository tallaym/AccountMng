<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function AfficherClient()
    {
        $clients = Client::all();
        return View('client.list',compact('clients'));
    }

    public function create()
    {
        return View('client.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'date_naissance' => 'nullable'
        ]);

        $client  = new Client();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->save();
        return redirect()->route('client.list')->with('success','Client ajouter');

    }

    public  function  delete(int $id)
    {
       $client = Client::find($id);
       $client->delete();
       return redirect()->back()->with('success','client supprimer');
    }
    public  function  edit(int $id)
    {
        $client = Client::find($id);
        return  view('client.edit',compact('client'));
       // return redirect()->back()->with('success','client supprimer');
    }

    public  function  update(Request $request, int $id)
    {
        $client = Client::find($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->update();

        return redirect()->route('client.list')->with('success','client modifier');
    }


}
