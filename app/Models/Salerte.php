<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salerte extends Model
{

    protected $table = 'salertes';
    public $timestamps = false;
    protected $guarded = [];

    public function saisie()
    {
        return $this->belongsTo(Saisie::class);
    }

    public function alerte()
    {
        return $this->belongsTo(Alerte::class);
    }

    public function sorigines()
    {
        return $this->hasMany(Sorigine::class);
    }

    public function sindicateur()
    {
      return $this->hasOne(Sindicateur::class);
    }

}
