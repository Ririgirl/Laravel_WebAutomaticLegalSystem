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
}
