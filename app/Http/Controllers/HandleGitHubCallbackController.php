<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class HandleGitHubCallbackController extends Controller
{
    /**
     * GitHub からユーザー情報を取得する.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = Socialite::driver('github')->stateless()->user();

        return json_encode($user);
    }
}
