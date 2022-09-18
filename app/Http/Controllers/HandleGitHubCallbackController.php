<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
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
        try {
            $user = Socialite::driver('github')->stateless()->user();
        } catch (ClientException $error) {
            $statusCode = $error->getResponse()->getStatusCode();

            abort_if($statusCode === 401, $statusCode);
        }

        return json_encode($user);
    }
}
