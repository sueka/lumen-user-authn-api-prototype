<?php

use App\Http\Controllers\HandleGitHubCallbackController;
use App\Http\Controllers\RedirectToGitHubController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/users', UserController::class)->only(['index', 'store']);

Route::get('/redirect-to-github', RedirectToGitHubController::class);
Route::get('/handle-github-callback', HandleGitHubCallbackController::class);

Route::get('/me', function () {
    $user = Auth::user();

    return $user;
})->middleware('auth');
