<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class TaskController extends Controller
{
    public function create(Request $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $endDate = $request->input('date');
        $priority = $request->input('priority');
        $status = $request->input('status');
        $respUser = $request->input('respUser');
        

        Task::create([
            'title' => $title,
            'description' => $description,
            'endDate' => $endDate,
            'priority' => $priority,
            'status' => $status,
            'responsible_user' => $respUser,
            'creator_user' => Auth()->user()->id,
        ]);

        return redirect()->route('user.tasks');
    }
    public function show(){
        if(Auth::check()){
            $users = User::where('role','=','user')->get();
            $tasks = Task::with('user')->get();
            return view('tasks',compact('users','tasks'));
        }
    }
}
