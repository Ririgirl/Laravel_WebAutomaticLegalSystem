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
        ->orderBy('tasks.created_at','desc')
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
        ->orderBy('tasks.created_at','desc')
        ->paginate(10);
        return view('tasks.donetask', compact('tasksdone'));
    }
    public function search(Request $request)
    {
        $search = $request->get('find_name');
        $finds = DB::table('tasks')
        ->join('acts', 'tasks.num_act', '=', 'acts.reg_number')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number', 'tasks.user_id')
        ->where('tasks.name', 'like', '%'.$search.'%')
        ->where('tasks.user_id', '=', Auth::user()->id)
        ->orderBy('tasks.created_at','desc')
        ->paginate(10);
        return view('tasks.search', compact('finds'));
    }
    public function updatetask($id)
    {
        $task = DB::table('tasks')
        ->join('acts', 'tasks.num_act', '=', 'acts.reg_number')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number', 'tasks.user_id')
        ->where('tasks.id','=', $id)
        ->first();
        return view('tasks.update_task', compact('task'));
    }
    public function updatetasksave(Request $request, $id)
    {
        $task = tasks::find($id);
        $task->name =  $request->get('name');
        $task->description =  $request->get('description');
        $task->status =  $request->get('status');
        $task->save();
        return redirect()->route('home');
    }
    public function createnewtask()
    {
        $acts = DB::table('acts')
        ->join('users', 'acts.user_id', '=', 'users.id')
        ->select('acts.reg_number', 'acts.type', 'acts.user_id')
        ->where('acts.user_id', '=', Auth::user()->id)
        ->get();
        return view('tasks.new_task', compact('acts'));
    }
    public function savenewtask(Request $request)
    {
        $task = new tasks;
        $task->name = $request->get('name');
        $task->status = $request->get('status');
        $task->description = $request->get('description');
        $task->num_act = $request->get('delo');
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect()->route('home');
    }
}
