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
        ->select('tasks.name', 'tasks.status', 'tasks.description', 'tasks.created_at', 'tasks.description', 'acts.reg_number')
        ->paginate(10);
        return view('home', compact('tasks'));
    }
}
