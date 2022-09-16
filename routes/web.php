<?php

use App\Http\Controllers\HandleGitHubCallbackController;
use App\Http\Controllers\RedirectToGitHubController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return app()->version();
});

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);

Route::get('/redirect-to-github', RedirectToGitHubController::class);
Route::get('/handle-github-callback', HandleGitHubCallbackController::class);

Route::get('/me', function () {
    $user = Auth::user();

    return $user;
})->middleware('auth');
