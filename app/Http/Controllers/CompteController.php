<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\AccountType;
use App\Models\compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public  function index()
    {
        return View("compte.index",[
            "comptes" => compte::with('client','accountType')->get()
        ]);
    }

    public  function create()
    {
        return View("compte.create",[
            "clients" => Client::all(),
            "typeCompte" => AccountType::all(),
        ]);
    }

    public  function store(Request $request)
    {
       $compte = new compte();
       $compte->solde = $request->solde;
       $compte->client_id = $request->client_id;
       $compte->account_type_id = $request->type_account;
       $compte->save();
       return redirect()->back();
    }


}
