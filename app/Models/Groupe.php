<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function chiffres()
    {
      return $this->hasMany(Chiffre::class);
    }
}
