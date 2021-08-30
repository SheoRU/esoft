<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;
use App\Models\Task;
use DB;

class RegistrationController extends Controller
{
    public function registration(Request $request){

        if(Auth::check()){
            return redirect()->route('user.tasks');
        }

        $validateFields= $request->validate([
            'login' => 'required',
            'password' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'patronymic' => 'required',

        ]);

        
        if(User::where('login',$validateFields['login'])->exists()){
            return redirect(route('user.registration'))->withErrors([
                'login' => 'Такой пользователь уже зарегестрирован'
            ]);
        }

        $user = User::create($validateFields);

        if($user){
            Auth::login($user);
            return redirect()->route('user.tasks');
        }

        return redirect(route('user.login'))->withErrors([
            'formError'=>'Произошла ошибка при обработке данных'
        ]);
    }
}
