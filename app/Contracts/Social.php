<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function userInit(User $user) : bool;
}