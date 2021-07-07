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
    public function full()
    {
        $user = Auth::user();

        $full = $user->findOrFail($user->id)->load('devices', 'categories');

        $logs = $user->
        devices()->
        firstOrFail()->
        logs()->
        firstOrFail()->
        get();

        //状態取得
        foreach($logs as $i => $log){
            $state[$log->device_id] = $log->state;
        }

        return with(['full'=>$full, 'state'=>$state]);
    }

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
        Auth::guard('web')->logout();
    }
}
