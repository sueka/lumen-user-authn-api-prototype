<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\ZxcvbnRule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all(); // TODO: authz
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => [
                'required',
                new ZxcvbnRule,
            ],
        ]);

        $user = new User;

        $user->username = $request->username;
        $user->password_hash = Hash::make($request->password);

        $user->save();
    }
}
