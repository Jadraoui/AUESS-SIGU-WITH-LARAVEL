<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('admin', function($user){
            return $user->profil_id == 1;
        });
    
        $gate->define('directeur', function($user){
            return $user->profil_id == 2;
        });
        $gate->define('agent_gu', function($user){
            return $user->profil_id == 3;
        });

        $gate->define('architecte', function($user){
            return $user->profil_id == 4;
        });
        $gate->define('agent_sf', function($user){
            return $user->profil_id == 5;
        });
        $gate->define('valideur_gu', function($user){
            return $user->profil_id == 6;
        });
        $gate->define('valideur_sf', function($user){
            return $user->profil_id == 7;
        });
        $gate->define('regisseur', function($user){
            return $user->profil_id == 8;
        });

        //admin or directeur
        $gate->define('adminOrdirecteur', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 2));
        });

        //admin or agent gu
        $gate->define('adminOragent_gu', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 3));
        });

          //admin or agent gu ou architecte
          $gate->define('adminOragent_guOrarchi', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 3) || ($user->profil_id == 4));
        });
        
         //admin or architecte
         $gate->define('adminOrarchi', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 4));
        });

         //admin or valideur gu
         $gate->define('adminOrval_gu', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 6));
        });

         //admin or regisseur
         $gate->define('adminOrregi', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 8));
        });

        
         //admin or regisseur or directeur 
         $gate->define('adminOrregiOrdir', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 8) || ($user->profil_id == 2));
        });




        //admin ou directeur ou agent_gu ou architecte ou valideur_gu ou valideur_sf or régisseur
        $gate->define('adminOrdirOrag_guOrarchiOrval_gu_sf', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 2)|| ($user->profil_id == 3)|| ($user->profil_id == 4)|| ($user->profil_id == 6)|| ($user->profil_id == 7) || ($user->profil_id == 8));
        });

        //admin ou directeur ou agent_gu ou architecte ou valideur_gu
        $gate->define('adminOrdirOrag_guOrarchiOrval_gu', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 2)|| ($user->profil_id == 3)|| ($user->profil_id == 4)|| ($user->profil_id == 6));
        });

        //admin ou directeur ou agent_gu ou architecte 
        $gate->define('adminOrdirOrag_guOrarchi', function($user){
            return (($user->profil_id == 1) || ($user->profil_id == 2) || ($user->profil_id == 3) || ($user->profil_id == 4));
        });

       
  //admin ou agent_gu ou architecte 
  $gate->define('adminOrag_guOrarchi', function($user){
    return (($user->profil_id == 1)  || ($user->profil_id == 3) || ($user->profil_id == 4));
});





        
    }
}
