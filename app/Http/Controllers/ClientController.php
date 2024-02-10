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
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\-]{2,}$/'],
            'prenom' => ['required', 'string', 'regex:/^[a-zA-Z][a-zA-Z]{2,}\s/'],
            'adresse' => ['required', 'string', 'max:255'],
            'date_naissance' => ['required', 'date', 'before_or_equal: -18 years'],
        ], [
            'nom.required' => 'Veuillez entrer un nom valide',
            'prenom.required' => 'Veuillez entrer un prénom valide, deux lettres minimum',
            'adresse.required' => 'Où habitez vous? A defaut, indiquer les alentours',
            'date_naissance.required' => 'Vous devez etre majeur pour avoir un compte',
            
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
