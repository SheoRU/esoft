<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Task;

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
    return view('welcome');
});
Route::name('user.')->group(function(){
    Route::get('/tasks',[\App\Http\Controllers\TaskController::class,'show'])->middleware('auth')->name('tasks');

    Route::get('/login',function(){
        if(Auth::check()){
            return redirect()->route('tasks');
        }
        return view('login');
        })->name('login');

    Route::post('login',[\App\Http\Controllers\LoginController::class,'login']);

    Route::get('logout',function(){
        Auth::logout();
        return redirect(route('user.login'));
        })->name('logout');

    Route::get('registration',function(){
        if(Auth::check()){
            return redirect()->route('tasks');
        }
        return view('registration');
        })->name('registration');

    Route::post('registration',[\App\Http\Controllers\RegistrationController::class,'registration']);
});

Route::get('/createtask', function () {
    Gate::authorize('createTask');
    return redirect()->route('createtask');
    })->middleware('auth')->name('createTask');

Route::post('createtask',function(){
    Gate::authorize('createTask');
    return [\App\Http\Controllers\RegistrationController::class,'registration'];
})->middleware('auth');

