<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{

    protected $table = 'especes';
    public $timestamps = false;
    protected $fillable = array('nom', 'icone');

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

    public function participants()
    {
      return $this->belongsToMany(Participant::class);
    }

    public function saisies()
    {
      return $this->hasMany(Saisie::class);
    }

    public function notes()
    {
      return $this->belongsToMany(Note::class);
    }

    public function chiffres()
    {
      return $this->hasMany(Chiffre::class);
    }

}
