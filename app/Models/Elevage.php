<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elevage extends Model
{
    protected $table = 'elevages';
    public $timestamps= false;
    protected $fillable = ['nom'];

    public function saisies()
    {
      return$this->hasMany(Saisie::class);
    }
}
