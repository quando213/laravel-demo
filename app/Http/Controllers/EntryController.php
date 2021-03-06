<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class EntryController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return $user;
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        $token = Auth::attempt($credentials);
        if ($token) {
            return [
                "user" => Auth::user(),
                "token" => $token
            ];
        } else {
            throw new UnauthorizedHttpException('', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return [
            'message' => 'User logged out'
        ];
    }
}
