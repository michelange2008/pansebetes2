<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sorigine extends Model
{

    protected $table = 'sorigines';
    public $timestamps = false;
    protected $fillable = array('origine_id', 'salerte_id', 'saisie_id');

    public function salerte()
    {
        return $this->belongsTo(Salerte::class);
    }

    public function origine()
    {
        return $this->belongsTo(Origine::class);
    }

    public function saisie()
    {
      return $this->belongsTo(Saisie::class);
    }

}
