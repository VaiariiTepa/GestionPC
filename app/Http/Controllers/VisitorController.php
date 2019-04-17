<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use App\Computer;


class VisitorController extends Controller
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
     * Récupère les Visiteur
     */
    public function all(){

            $visitor = Visitor::all();

            return $visitor;
    }

    /**
     * Creer un Visiteur
     * @Request
     */
    public function create(Request $request){

        $input = $request->all();

        $visitor = new Visitor();
        $visitor ->firstname = $input['firstname'];
        $visitor ->lastname = $input['lastname'];
        $visitor ->number = $input['numberphone'];
        $visitor ->email = $input['email'];

        $visitor ->save();
        return redirect()->route('all_assignment');
    }

}
