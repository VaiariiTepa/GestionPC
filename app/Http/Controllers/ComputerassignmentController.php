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

        //verifie la disponibilité du crénaux horaire choisie
        $all_computerassignment = Computerassignment::all();
ours;

                   $assignment ->close = $finish_h                    $assignment = new Computerassignment();
        // var_dump($all_computerassignment);
        if (isset($all_computerassignment)) {
            foreach($all_computerassignment as $computerassignment){                //SI '<' a l'heure début ET '>' a l'heure fin, ALORS enregistré
                if ($finish_hours < $computerassignment['open']) {
                    if ($finish_hours > $computerassignment['close']) {

                       $assignment ->visitor_id = $in  t['i  d                        $assignment ->visitor_id = $input['id_visitor'];
                        $assignmen
        // var_dum$allomputerassignment)) {
              reach          // var_dump($all_computer            foreach($all_computerassignment as $computerassignment){

        ->save();

           $all_computerassignment as $computerassignment){
            $assignment                 //dans la DB
             '<' a l'heure début ET '>' a l'heure fin, ALORS enregistré
       //enregistrement $finish_hours < $computerassignment->open) {
                    if ($finish_hours > $computerassignment->close) {
_hours;

                 $assignment = new Computerassignment();
gnment ->close = $finish    $assignment ->visitor_id = $input['id_visitor'];
                        $assignment ->computer_id = $input['id_computer'];
                       $    $assignment ->open = $hours_trimmed;
 assignment);
        if (isset($al                        $assignment ->visitor_id = $input['id_visitor'];

            return redire            return redirect()->route('all_assignment');
           }rect()->route('all_assignment');
                 }



    /**
     * //Ajax -- récupère l<?php

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

        //verifie la disponibilité du crénaux horaire choisie
        $all_computerassignment = Computerassignment::all();
                    $assignment = new Computerassignment();
        // var_dump($all_computerassignment);
        if (isset($all_computerassignment)) {
            foreach($all_computerassignment as $computerassignment){

                //SI '<' a l'heure début ET '>' a l'heure fin, ALORS enregistré
                if ($finish_hours < $computerassignment['open']) {
                    if ($finish_hours > $computerassignment['close']) {

                        $assignment ->visitor_id = $input['id_visitor'];
                        $assignment ->computer_id = $input['id_computer'];
                        $assignment ->open = $hours_trimmed;
                        $assignment ->close = $finish_hours;

                        //enregistrement dans la DB
                        $assignment ->save();

                        return redirect()->route('all_assignment');
                    }

                }

            }
            return redirect()->route('all_assignment');
        }

    }



