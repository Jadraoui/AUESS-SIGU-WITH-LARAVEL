<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Gate;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function register(Request $request)

    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
   
    
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(!Gate::allows('admin')){
            return view('erreur');
        }
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
           

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profil_id' => ['required', 'integer', 'max:20'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
         


            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profil_id' => $data['profil_id'],
           

        ]);         

    }

    protected $redirectTo = '/user';

}
