<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Session;


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
        return view('home');
    }

    public function form(Request $request)
    {
        //Alert::success('Success Title', 'Success Message');
        //Alert::info('Info Title', 'Info Message');
        //Alert::warning('Warning Title', 'Warning Message');
        //Alert::error('Error Title', 'Error Message');
        //Alert::question('Question Title', 'Question Message');
        //Alert::html('Html Title', 'Html Code', 'Type');
        //Alert::toast('Toast Message', 'Toast Type');
        //alert()->success('Title','Lorem Lorem Lorem');
        //Session('success','Logged in Successfully.');
       //return back()->with('success','Logged in Successfully.');
        return back();
    }
}
