<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quack extends Model
{
    /** @use HasFactory<\Database\Factories\QuackFactory> */
    use HasFactory;

    protected $fillable = ['contenido'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function usersQuaved() {
        return $this->belongsToMany(User::class, 'quavs', 'quack_id', 'user_id')->withTimestamps();
    }

    public function usersRequacked() {
        return $this->belongsToMany(User::class, 'requacks', 'quack_id', 'user_id')->withTimestamps();
    }

    public function quashtags() {
        return $this->belongsToMany(Quashtag::class)->withTimestamps();
    }

    public function comentarios() {
        return $this->belongsToMany(User::class, 'comentarios')->withPivot('contenido')->withTimestamps();
    }
}
