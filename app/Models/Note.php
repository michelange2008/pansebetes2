<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_id', 'note_fond', 'avis_fond', 'note_forme', 'avis_forme', 'utilisation'];


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function especes()
    {
      return $this->belongsToMany(Espece::class);
    }
}
