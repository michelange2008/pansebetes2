<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "participants";
    public $timestamps = false;
    protected $guarded = [];

    public function especes()
    {
      return $this->belongsToMany(Espece::class);
    }

}
