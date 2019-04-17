<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Computerassignment;
use App\Visitor;
use App\Computer;

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
        // //récupère les utilisateurs
        // $visitor = new Visitor();
        // $v = $visitor->all();

        // //récupère les ordinateur
        // $computer = new Computer();
        // $c = $computer->all();

        // return view('home')->with([
        //     'visitor'=>$v,
        //     'computer'=>$c,
        //     ]);

        return redirect()->route('all_assignment');


    }


}
