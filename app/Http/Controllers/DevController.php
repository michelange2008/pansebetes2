<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Alerte;
use App\Models\User;
use App\Models\Paraferme;
use App\Models\Chiffre;
use App\Models\Espece;



class DevController extends Controller
{
    public function dev()
    {
      // echo "page pour faire des choses dans la bdd";

      return view('admin.dev.index');

    }

    public function store(Request $request)
    {
      dd($request->all());

    }
}
