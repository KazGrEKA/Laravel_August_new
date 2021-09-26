<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as Model;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function userInit(User $user) : bool
    {
        $userData = Model::where(['email' => $user->getEmail()])->first();

        //dd($userData);

        if($userData) {
            //auth
            $userData->name = $user->getName();
            $userData->avatar = $user->getAvatar();

            if ($userData->save()) {
                \Auth::loginUsingId($userData->id);

                return true;
            }

        } else {

            //register
            
        }

        throw new \Exception("Не удалось сохранить пользователя");
    }
}