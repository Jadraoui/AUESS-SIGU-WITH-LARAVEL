<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Gate;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function register(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $profil = Profil::all();
        return view('auth.register',['profil'=>$profil]);
    }
    public function index()
    {
        if(!Gate::allows('adminOrdirecteur')){
            return view('erreur');
        }
        $listprofil =Profil::all();

        return view('profil.index', ['profils' => $listprofil]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        if(!Gate::allows('admin')){
            return view('erreur');
        }
      $profil = Profil::find($id);
      return view('profil.edit',['pro' => $profil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $profil = Profil::find($id);
            $profil->intitule = $request->input('intitule');
            $profil->description = $request->input('desc');
            
            $profil->save();
            return redirect('profil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
    }
}
