<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Projet, App\Commission, App\User;
use DB;

class ChartController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request){


        $users=DB::table('users')->count('id');
        $dossiers=DB::table('projets')->count('id');
        $commissions=DB::table('commissions')->count('id');
        $factures=DB::table('factures')->count('id');

        /********************************************************/
        
                $annee=date('Y');
                $annee=$request->input('annee');
                $nbr_doss = Charts::multidatabase('bar', 'highcharts')
                ->title("Nombre des dossiers avec un avis favorable et défavorable par mois et par années")
                ->elementLabel("Nombre des dossiers")
                ->dataset( 'Dossier favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                ->dataset( 'Dossier défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Refus')
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                ->responsive(false)
                ->groupByMonth($annee, true);

    /**************************************************************************/


                $favo=DB::table('projets')->Join('commissions','projets.id','=','commissions.projet_id')->where('projets.deleted_at', NULL)->where('type', 'Accord de Principe')->count();
                $defavo=DB::table('projets')->Join('commissions','projets.id','=','commissions.projet_id')->where('projets.deleted_at', NULL)->where('type','Refus')->count();
                $nbr2_doss =  Charts::create('pie', 'highcharts')
                ->title("Nombre des dossiers avec un avis favorable et défavorable")
                ->elementLabel("Nombre des dossiers")
                ->responsive(false)
                ->labels(['Favorable','Défavorable'])
                ->values([$favo,$defavo]);
              

   /***************************************************************************/

                    $anneePPU=date('Y');
                    $anneePPU=$request->input('anneePPU');
                    $nbrPPU = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des petits projets urbains avec un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des petits projet urbains")
                    ->dataset( 'PPU avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',1)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'PPU avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',1)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneePPU, true);

/*********************************************************************************/


   /***************************************************************************/

                    $anneePPR=date('Y');
                    $anneePPR=$request->input('anneePPR');
                    $nbrPPR = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des petits projets ruraux avec un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des petits projet ruraux")
                    ->dataset( 'PPR avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',3)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'PPR avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',3)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneePPR, true);


   /***************************************************************************/

                    $anneeGPU=date('Y');
                    $anneeGPU=$request->input('anneeGPU');
                    $nbrGPU = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des grand projet urbains avec un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des grand projet urbains")
                    ->dataset( 'GPU avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',2)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'PPR avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',2)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneeGPU, true);

     /***************************************************************************/

                    $anneeGPR=date('Y');
                    $anneeGPR=$request->input('anneeGPR');
                    $nbrGPR = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des grand projet ruraux avec un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des grand projet ruraux")
                    ->dataset( 'GPR avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',4)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'GPR avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',4)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneeGPR, true);

 /***************************************************************************/

                    $anneeADHOC=date('Y');
                    $anneeADHOC=$request->input('anneeADHOC');
                    $nbrADHOC = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des projets AD-HOC avec un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des projets AD-HOC")
                    ->dataset( 'AD-HOC avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',5)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'AD-HOC avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',5)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneeADHOC, true);

 /***************************************************************************/

                    $anneeDEROGATION=date('Y');
                    $anneeDEROGATION=$request->input('anneeDEROGATION');
                    $nbrDEROGATION = Charts::multidatabase('bar', 'highcharts')
                    ->title("Nombre des dérogations dans le milieu rural ayant un avis favorable et défavorable par mois et par années")
                    ->elementLabel("Nombre des dérogations")
                    ->dataset( 'Dérogations avec avis favorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where('type', 'Accord de Principe')
                    ->where('commissions.projet_id',6)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')->get())
                    ->dataset( 'Dérogations avec avis défavorable', DB::table('projets')
                    ->Join('commissions','projets.id','=','commissions.projet_id')
                    ->where( 'type','Refus')
                    ->where('commissions.projet_id',6)
                    ->where('projets.deleted_at', NULL)
                    ->select('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->groupBy('commissions.id','commissions.created_at', 'commissions.projet_id')
                    ->get())
                    ->responsive(false)
                    ->groupByMonth($anneeDEROGATION, true);


     /*******************************************************************/



            $annee_SRV=date('Y');
                    $annee_SRV=$request->input('annee_SRV');
                    $services_mois = Charts::multidatabase('areaspline ', 'highcharts')
                    ->title("Les services rendus par mois et par années")
                    ->elementLabel("Nombre des dossiers")
                    ->dataset( 'Services payés', DB::table('projets')
                         ->where('projets.deleted_at', NULL)
                    ->where('payement', 1)->get())
                    ->dataset( 'Services impayés', DB::table('projets')
                         ->where('projets.deleted_at', NULL)
                    ->where('payement', 0)
                    ->get())

                    ->responsive(false)
                    ->colors(['royalblue    ', 'skyblue '])
                    ->groupByMonth($annee_SRV, true);


           /*******************************************************************/
           
           
                    $services_annees = Charts::multidatabase('areaspline ', 'highcharts')
                    ->title("Les services rendus par mois et par années")
                    ->elementLabel("Nombre des dossiers")
                    ->dataset( 'Services payés', DB::table('projets')
                         ->where('projets.deleted_at', NULL)
                    ->where('payement', 1)->get())
                    ->dataset( 'Services impayés', DB::table('projets')
                         ->where('projets.deleted_at', NULL)
                    ->where('payement', 0)
                    ->get())

                    ->responsive(false)
                    ->colors(['royalblue    ', 'skyblue '])
                    ->groupByYear(3, true);         



   /***************************************************************************/
                   $ppu = Projet::where('typeProjet_id','1') ->where('projets.deleted_at', NULL)->count();
                   $gpu = Projet::where('typeProjet_id','2') ->where('projets.deleted_at', NULL)->count();
                   $ppr = Projet::where('typeProjet_id','3') ->where('projets.deleted_at', NULL)->count();
                   $gpr = Projet::where('typeProjet_id','4') ->where('projets.deleted_at', NULL)->count();
                   $adhoc = Projet::where('typeProjet_id','5') ->where('projets.deleted_at', NULL)->count();
                   $derogation = Projet::where('typeProjet_id','6') ->where('projets.deleted_at', NULL)->count();
                 
                   $nbr_proj = Charts::create('pie', 'highcharts')
                   ->title(" Taux des projets")
                   ->responsive(false)

                   ->labels(['PPU','GPU','PPR','GPR','ADHOC','DEROGATION'])
                   ->values([$ppu,$gpu,$ppr,$gpr,$adhoc,$derogation]);
                  /* ->colors(['red', 'blue', 'green', 'yellow', 'lime', 'purple']);*/

        return view('statistiques.index', ['nbr_doss' => $nbr_doss, 'nbr2_doss' => $nbr2_doss , 'nbrPPU' => $nbrPPU, 'nbr_proj' => $nbr_proj , 'nbrPPR' => $nbrPPR , 'nbrGPU' => $nbrGPU ,'nbrGPR' => $nbrGPR, 'nbrADHOC' => $nbrADHOC, 'nbrDEROGATION' => $nbrDEROGATION, 'services_mois' => $services_mois , 'services_annees' => $services_annees] , ['users' => $users,     'dossiers' => $dossiers, 'commissions' => $commissions, 'factures' => $factures ]);
    }
}
