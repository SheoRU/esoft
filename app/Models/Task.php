<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'responsible_user','id');
    }

    protected $fillable=[
        'title',
        'description',
        'endDate',
        'priority',
        'status',
        'creator_user',
        'responsible_user',
    ];

}
