<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\Task;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'login',
        'password',
        'name',
        'lastName',
        'patronymic',
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
}
