<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class RedirectToGitHubController extends Controller
{
    /**
     * GitHub 認証ページにリダイレクトする.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
}
