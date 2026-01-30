<?php

namespace App\Policies;

use App\Models\Quack;
use App\Models\User;

class QuackPolicy
{
   public function edit(User $user, Quack $quack){
    return $quack->user->is($user);
   }
}
