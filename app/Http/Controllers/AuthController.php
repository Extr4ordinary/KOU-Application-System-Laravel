<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Auth;

class AuthController extends Controller
{
    public function __construct(Auth $auth, Storage $storage)
    {
        $this->auth = $auth;
        $this->storage = $storage;
    }

    public function registerAuth(Request $req)
    {
        $user = [
            'email' => $req->input('email'),
            'emailVerified' => false,
            'password' => $req->input('pass'),
            'displayName' => '',
            'disabled' => false
        ];
        $createUser = $this->auth->createUser($user);
        return redirect()->route('login');
    }
}
