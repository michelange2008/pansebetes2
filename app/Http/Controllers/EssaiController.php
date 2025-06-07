<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\Accepte;

class EssaiController extends Controller
{

    public function index()
    {
      $inscription = User::first();

      dd(auth()->user());

      Mail::to($inscription)->cc(auth()->user())->send(new Accepte($inscription));
    }
}
