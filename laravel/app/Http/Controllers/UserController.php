<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//リクエスト
use App\Http\Requests\LoginUserRequest;

//認証
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function login(LoginUserRequest $request)
    {
        
        if (Auth::attempt($request->all())) {
            return ['message' => 'ログイン'];
        }

        throw ValidationException::withMessages([
            'email' => ['メールアドレスまたはパスワードが違います。'],
        ]);
        
    }

    public function logout()
    {
        Auth::logout();
    }
}
