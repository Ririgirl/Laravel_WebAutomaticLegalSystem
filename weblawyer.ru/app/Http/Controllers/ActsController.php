<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tasks;
use App\acts;
use DB;
use App\User;
use Auth;

class ActsController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth');
    }
    public function seeacts()
    {
        $acts = DB::table('acts')
        ->join('users', 'acts.user_id', '=', 'users.id')
        ->select('acts.reg_number', 'acts.type', 'acts.user_id')
        ->where('acts.user_id', '=', Auth::user()->id)
        ->paginate(50);
        $types_acts = DB::table('acts')
        ->select('type')
        ->distinct('type')
        ->get();
        return view('acts.start', compact('acts', 'types_acts'));
    }
    public function search(Request $request)
    {
        $search = $request->get('find_num');
        $finds = DB::table('acts')
        ->join('users', 'acts.user_id', '=', 'users.id')
        ->select('acts.reg_number', 'acts.type', 'acts.user_id')
        ->where('acts.user_id', '=', Auth::user()->id)
        ->where('acts.reg_number', 'like', '%'.$search.'%')
        ->paginate(50);
        return view('acts.search', compact('finds'));
    }
    public function seetypeacts($name)
    {
    	$finds_types = DB::table('acts')
      ->join('users', 'acts.user_id', '=', 'users.id')
      ->select('acts.reg_number', 'acts.type', 'acts.user_id')
      ->where('acts.user_id', '=', Auth::user()->id)
      ->where('acts.type', '=', $name)
      ->get();
    	return view('acts.seeacts_of_type', compact('finds_types'));
    }
    public function newact()
    {
        $new_act = DB::table('acts')
        ->join('users', 'acts.user_id', '=', 'users.id')
        ->select('acts.reg_number', 'acts.type', 'acts.user_id')
        ->where('acts.user_id', '=', Auth::user()->id);
        return view('acts.new_act', compact('new_act'));
    }
    public function savenewact(Request $request)
    {
        $act = new acts;
        $act->reg_number = $request->get('num');
        $act->type = $request->get('type');
        $act->user_id = Auth::user()->id;
        $act->save();
        return redirect()->route('actstart');
    }
    public function see_act($num_act)
    {
    	$watch = DB::table('acts')
      ->join('users', 'acts.user_id', '=', 'users.id')
      ->join('tasks', 'tasks.num_act', '=', 'acts.reg_number')
      ->select('acts.reg_number', 'acts.type', 'acts.user_id', 'tasks.name', 'tasks.status', 'tasks.id', 'tasks.description', 'tasks.created_at')
      ->where('acts.user_id', '=', Auth::user()->id)
      ->where('acts.reg_number', '=', $num_act)
      ->get();
    	return view('acts.seeact', compact('watch'));
    }
}
