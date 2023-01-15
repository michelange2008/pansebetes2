<?php
namespace App\Traits;

use App\Models\Saisie;
use Carbon\Carbon;

trait CreeSaisie
{

    public function nouvelleSaisie($elevage_id)
    {
        $saisie = new Saisie();

        $saisie->user_id = auth()->guard()->user()->id;

        $saisie->espece_id = session()->get('espece_id');

        $saisie->elevage_id = $elevage_id;

        $saisie->save();

        session()->put('saisie_id', $saisie->id);

        return $saisie->id;

    }

}
