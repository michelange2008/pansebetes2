<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numalerte extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = array();

    public function alerte()
    {
      return $this->belongsTo(Alerte::class);
    }

    public function num()
    {
      return $this->belongsTo(Chiffre::class, 'num_id');
    }

    public function denom()
    {
      return $this->belongsTo(Chiffre::class, 'denom_id');
    }
}
