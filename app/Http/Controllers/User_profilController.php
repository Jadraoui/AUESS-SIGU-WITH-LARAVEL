<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Hash;
use Auth;


use Illuminate\Http\Request;

class User_profilController extends Controller
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
        $listuser =DB::table('users')
                ->join('profils','users.profil_id','=','profils.id')
                ->select('users.*','profils.intitule')
                ->get();


        return view('user_profil.index', ['user' => $listuser]);
    }
    
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
  $user = User::find($id);
  return view('user_profil.edit',['user' => $user]);
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
         if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
    }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/');
    }
public function changePassword(Request $request){
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
    }
    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent.");
    }
    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();
    return redirect()->back()->with("success"," Mot de passe changé avec succès !");
}

public function showChangePasswordForm(){
    return view('auth.changepassword');
}
}

