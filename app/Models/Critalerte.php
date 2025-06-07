<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Critalerte extends Model
{

    protected $table = 'critalertes';
    public $timestamps = false;
    protected $guarded = [];

    public function alerte()
    {
        return $this->belongsTo(Alerte::class);
    }

}
