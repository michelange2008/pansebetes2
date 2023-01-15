<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sindicateur extends Model
{
    use HasFactory;

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
}
