<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Computerassignment;
use App\Visitor;
use App\Computer;

class ComputerassignmentController extends Controller
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
     * Assigne un Ordinateur a un Utilisteur
     * @Request
     */
    public function create(Request $request){

        $input = $request->all();

        $assignment = new Computerassignment();
        $assignment ->visitor_id = $input['id_visitor'];
        $assignment ->computer_id = $input['id_computer'];

        //retire le "H" de l'heure
        $hours_trimmed = str_replace("h", "", $input['hours']);

        //formatage heure de début+temps d'attribution
        $range_hours = $input['range_hours'];
        if($range_hours >= 240){
            $range_hours = $range_hours - 240;
            $range_hours = $range_hours+400;
        }elseif($range_hours >= 180){
            $range_hours = $range_hours - 180;
            $range_hours = $range_hours+300;
        }elseif($range_hours >= 120){
            $range_hours = $range_hours - 120;
            $range_hours = $range_hours+200;
        }elseif($range_hours >= 60){
            $range_hours = $range_hours - 60;
            $range_hours = $range_hours+100;
        }

        //additionne l'heure de début+temps d'attribution
        $finish_hours = $hours_trimmed + $range_hours;

        $assignment ->open = $hours_trimmed;
        $assignment ->close = $finish_hours;

        //enregistrement dans la DB
        $assignment ->save();

        return redirect()->route('all_assignment');
    }




    /**
     * //Ajax -- récupère les heures d'attribution succèptible d'être disponible
     */
    public function get_hours(Request $request){
        $id_computer = request('id_computer');

        $close_hour_by_computer = Computerassignment::select('close')
        ->where('computer_id','=',$id_computer)
        ->orderby('computer_id','asc')
        ->first();

        $open_hour_by_computer = Computerassignment::select('open')
        ->where('computer_id','=',$id_computer)
        ->get();

        foreach($open_hour_by_computer as $open){
            if($open !== $close_hour_by_computer){
                $propose_hours = $close_hour_by_computer;

                return json_encode($propose_hours);
            }

        }


    }


    /**
     * Récupère les attribution d'ordinateur
     */
    public function all_assignment(){

        $computerassignment = Computerassignment::select('visitors.id as visitor_id','visitors.firstname',
                                'visitors.lastname','visitors.number','visitors.email','computers.ref',
                                'computers.id as computer_id','computerassignments.open','computerassignments.close',
                                'computerassignment.id')
                                ->join('visitors', 'visitors.id', '=', 'computerassignments.visitor_id')

                                ->join('computers', 'computers.id', '=', 'computerassignments.computer_id')

                                ->get();


        $all_visitor = Visitor::all();
        $all_computer = Computer::all();

        return view('home')->with([
            'computerassignment'=>$computerassignment,
            'visitor'=>$all_visitor,
            'computer'=>$all_computer,
            ]);
    }

    /**
     * Supprime l'ordinateur qui a été attribuer
     */
    public function cancel($computerassignment_id){
        $assignments = Computerassignment::find($computerassignment_id);
        $assignments ->delete();

        //récupère les visiteurs/ordinateurs/assignment
        $all_visitor = Visitor::all();
        $all_computer = Computer::all();
        $computerassignment = $this->all_assignment();

        return view('home')->with([
            'computerassignment'=>$computerassignment,
            'visitor'=>$all_visitor,
            'computer'=>$all_computer,
            ]);

    }




}
