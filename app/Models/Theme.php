<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{

    protected $table = 'themes';
    public $timestamps = false;
    protected $fillable = array('nom', 'icone');

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }

}
