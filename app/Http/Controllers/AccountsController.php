<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\Client;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public  function create()
    {
        return View("accounts.create",[
            "clients" => Client::all(),
            "typeClient" => AccountType::all(),
        ]);
    }
}
