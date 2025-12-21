<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'usuario',
        'email',
        'password',
    ];

    public function quacks() {
        return $this->hasMany(Quack::class);
    }

    public function quacksQuaveados() {
        return $this->belongsToMany(Quack::class, 'quavs')->withTimestamps();
    }

    public function quacksRequackeados() {
        return $this->belongsToMany(Quack::class, 'requacks')->withTimestamps();
    }

    public function seguidores() {
        return $this->belongsToMany(User::class, 'seguidor_seguido', 'seguido_id', 'seguidor_id')->withTimestamps();
    }

    public function siguiendo() {
        return $this->belongsToMany(User::class, 'seguidor_seguido', 'seguidor_id', 'seguido_id')->withTimestamps();
    }

    public function quacksComentados() {
        return $this->belongsToMany(Quack::class, 'comentarios')->withPivot('contenido')->withTimestamps();
    }
}
