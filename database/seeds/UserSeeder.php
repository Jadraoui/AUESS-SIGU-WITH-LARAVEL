<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profil;
use App\Type_projet;
use App\Categorie_projet;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $profil= new Profil();
        $profil->intitule='administrateur';
        $profil->description='gérer les utilisateur et les profils, superviser tous les modules';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='directeur';
        $profil->description='Superviser tous les modules de l application';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='Agent Gu';
        $profil->description='gérer les dossiers, superviser les services rendus et tableaux de bord';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='Architecte';
        $profil->description='gérer la fiche de taxe et les résultats des commissions,superviser les dossiers, services rendus et tableaux de bord ';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='Agent SF';
        $profil->description='Superviser les services rendus, gérer les factures de chaque service rendu';
        $profil->save();

       
        $profil= new Profil();
        $profil->intitule='Valideur GU';
        $profil->description='Superviser les dossiers,les services rendus et tableaux de bord, valider les fiches de taxe';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='Valideur SF';
        $profil->description='Superviser les services rendus et tableaux de bord, valider les factures des services rendus';
        $profil->save();

        $profil= new Profil();
        $profil->intitule='Régisseur';
        $profil->description='Superviser les services rendus,gérer les fiches de calcul de chaque service rendu, les autorisations et les reçus de payement';
        $profil->save();

    
        $ca=new Categorie_projet();
        $ca->intitule='Urbaine';
        $ca->save();
        
        $ca=new Categorie_projet();
        $ca->intitule='Rurale';
        $ca->save();

        $ty=new Type_projet();
        $ty->intitule_type='PPU';
        $ty->categorie_id='1';
        $ty->save();

        $ty=new Type_projet();
        $ty->intitule_type='GPU';
        $ty->categorie_id='1';
        $ty->save();

        $ty=new Type_projet();
        $ty->intitule_type='PPR';
        $ty->categorie_id='2';
        $ty->save();

        $ty=new Type_projet();
        $ty->intitule_type='GPR';
        $ty->categorie_id='2';
        $ty->save();

        $ty=new Type_projet();
        $ty->intitule_type='AD-HOC';
        $ty->categorie_id='2';
        $ty->save();

        $ty=new Type_projet();
        $ty->intitule_type='Derogation';
        $ty->categorie_id='2';
        $ty->save();

        $user =new User();
        $user->name= 'admin admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt(12345678);        
        $user->profil_id=1;

        $user->save();
        
    }
}
