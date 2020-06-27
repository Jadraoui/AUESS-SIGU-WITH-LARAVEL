<?php

namespace App\Http\Controllers;
use App\Type_projet;

use Illuminate\Http\Request;
use Gate;

class Type_projetController extends Controller
{
    public function create(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $types = Type_projet::all();
        return view('dossier.create',['types'=>$types]);
    }

}
