<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ami extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function ami()
    {
      return $this->belongsTo(User::class, 'ami_id');
    }
}
