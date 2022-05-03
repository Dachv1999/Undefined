<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'esAdmin',
    ];

    public $timestamps =false;
    public function aulas(){
        return $this->hasMany(Aula::class,'id');
    }
    public function reservas(){
        return $this->hasMany(Reserva::class,'id');
    }
    public function grupos(){
        return $this->hasMany(Grupo::class,'id');
    }

}
