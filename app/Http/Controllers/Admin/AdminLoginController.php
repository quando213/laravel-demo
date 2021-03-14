<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AdminLoginController extends Controller
{
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
            throw new UnauthorizedHttpException('', 'Sai email và/hoặc mật khẩu');
        }
    }

    public function getProfile()
    {
        return Auth::guard('jwt')->user();
    }

    public function logout()
    {
        Auth::logout();
        return [
            'status' => 1,
            'message' => 'Đăng xuất thành công'
        ];
    }
}
