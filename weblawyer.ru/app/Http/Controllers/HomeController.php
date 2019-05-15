<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tasks;
use App\acts;
use DB;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = DB::table('tasks')
        ->join('acts', 'tasks.num_act', '=', 'acts.reg_number')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number', 'tasks.user_id')
        ->where('tasks.status', '=', 'В работе')
        ->where('tasks.user_id', '=', Auth::user()->id)
        ->paginate(10);
        return view('home', compact('tasks'));
    }
    public function seetask($id)
    {
        $task = DB::table('tasks')
        ->join('acts', 'tasks.num_act', '=', 'acts.reg_number')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number', 'tasks.user_id')
        ->where('tasks.id', '=', $id)
        ->where('tasks.user_id', '=', Auth::user()->id)
        ->first();  
        return view('tasks.idtask', compact('task'));
    }
    public function seetaskdone()
    {
        $tasksdone = DB::table('tasks')
        ->join('acts', 'tasks.num_act', '=', 'acts.reg_number')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number', 'tasks.user_id')
        ->where('tasks.status', '=', 'Выполнено')
        ->where('tasks.user_id', '=', Auth::user()->id)
        ->paginate(10);
        return view('tasks.donetask', compact('tasksdone'));
    }
    public function search(Request $request)
    {
        
    }
}
