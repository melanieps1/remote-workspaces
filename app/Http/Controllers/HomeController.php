<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $workspaces = \App\Workspace::all(); (this is the same thing, just without the DB facade)
        $workspaces = DB::table('workspaces')->get();

        return view('/results', compact('workspaces'));

    }

    public function home()
    {
        return view('home');
    }

    public function components()
    {
        return view('components');
    }
}
