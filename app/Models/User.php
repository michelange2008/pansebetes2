<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profession',
        'region',
        'admin',
        'valide'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function salertes()
    {
        return $this->hasMany('Salerte', 'alerte_id');
    }

    public function slistes()
    {
        return $this->hasMany(Saisie::Class);
    }

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    public function parafermes()
    {
      return $this->belongsToMany(Paraferme::class)
                  ->as('param')
                  ->withPivot('value');
    }
    public function saisies()
    {
      return $this->hasMany(Saisie::class);
    }

    public function amis()
    {
      return $this->hasMany(Ami::class);
    }

}
