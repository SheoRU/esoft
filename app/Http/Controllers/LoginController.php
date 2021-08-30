<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Task;
use DB;
use View;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->route('user.tasks');
        }

        $formFields = $request->only(['login','password']);

        $hashedPassword = User::select('password')->where('login','=',$formFields['login'])->first()->password;
        if(User::where('login','=',$formFields['login'])->count() ==0 ){
            return redirect(route('user.login'))->withErrors([
                'login' => 'Пользователя с таким логином не существует'
            ]);
        }
        if(Hash::check($formFields['password'],$hashedPassword) === false){
            return redirect(route('user.login'))->withErrors([
                'password' => 'Неверный пароль'
            ]);
        }

        if(Auth::attempt($formFields)){
            return redirect()->route('user.tasks');
        }
        
        return redirect(route('user.login'))->withErrors([
            'login' => 'Не удалось авторизоваться'
        ]);
    }
}

//
