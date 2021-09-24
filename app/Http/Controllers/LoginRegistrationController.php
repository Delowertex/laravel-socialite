<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTable;
use Laravel\Socialite\Facades\Socialite;

class LoginRegistrationController extends Controller
{
    public function callGithub(){
        $callGithubLoginService = Socialite::driver('github')->redirect();
        return $callGithubLoginService;
    }

    public function githubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        $token = $user->token;
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();

        return $user->getAvatar();
    }

    // public function onRegister(){
    //     UserTable::create([
    //         'name'=>
    //         'name'=>
    //         'name'=>
    //         'name'=>
    //         'name'=>
    //     ])
    // }
}
