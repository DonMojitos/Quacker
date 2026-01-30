<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function edit(User $userAutenticado, User $user){
        //dd($userAutenticado->id, $user->id);
        return $user->is($userAutenticado);
    }
}
