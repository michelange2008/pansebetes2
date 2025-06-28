<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{

    protected $table = 'alertes';
    public $timestamps = false;
    protected $fillable = array('nom', 'type', 'unite', 'niveau', 'modalite', 'theme_id', 'espece_id');

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function critalertes()
    {
        return $this->hasMany(Critalerte::class, 'alerte_id');
    }

    public function origines()
    {
        return $this->hasMany(Origine::class, 'alerte_id');
    }

    public function espece()
    {
        return $this->belongsTo(Espece::class);
    }

    public function salertes()
    {
        return $this->hasMany(Salerte::class, 'alerte_id');
    }

    public function numalerte()
    {
      return $this->hasOne(Numalerte::class);
    }

    public function type()
    {
      return $this->belongsTo(Type::class);
    }

    public function modalite()
    {
      return $this->belongsTo(Modalite::class);
    }
}
