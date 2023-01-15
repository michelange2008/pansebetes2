<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schiffre extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function saisie()
    {
      return $this->belongsTo(Saisie::class);
    }

}
