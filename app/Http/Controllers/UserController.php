<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use DB;
use Gate;


class UserController extends Controller
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

        public function index()
        {
            if(!Gate::allows('adminOrdirecteur')){
                return view('erreur');
            }
            $listuser =DB::table('users')
                    ->join('profils','users.profil_id','=','profils.id')
                    ->select('users.*','profils.intitule')
                    ->get();

    
            return view('utilisateur.index', ['user' => $listuser]);
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
  $user = User::find($id);
  return view('utilisateur.edit',['user' => $user]);
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profil_id = $request->input('profil_id');

      
        $user->save();
        return redirect('user');

}

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }


    }
