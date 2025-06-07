<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalite extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function alerte()
    {
      return $this->hasMany(Alerte::class);
    }
}
