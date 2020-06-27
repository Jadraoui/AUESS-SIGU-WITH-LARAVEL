<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;

use App\Projet;
use App\Type_projet;
use App\Historique;
use App\Facture;
use DB;
use App\User;
use Gate;
use App\Commission;
use App\Imports\ProjetImport;

use Session;


class ProjetController extends Controller
{



    public function index(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }

        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.index', ['projets' => $projets]);
    }

    public function downloadPDF_tous(){
        $pro = Projet::all();
        $pdf = PDF::loadView('dossier.file_pdf',['pro'=>$pro]);
        return $pdf->download('Tous.pdf');
    }

    public function viewPDF_tous(){
        $pro = Projet::all();
        $pdf = PDF::loadView('dossier.file_pdf',['pro'=>$pro]);
        return $pdf->stream();
    }

    public function viewPDF_ppu(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','1')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('ppu.pdf');
    }

    public function viewPDF_ppr(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','3')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('ppr.pdf');
    }

    public function viewPDF_gpu(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','2')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('gpu.pdf');
    }

    public function viewPDF_gpr(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','4')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('gpr.pdf');
    }

    public function viewPDF_ADHOC(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','5')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('ADHOC.pdf');
    }

    public function viewPDF_Derogation(){
        $pro = Projet::all();
        $pro = Projet::Where('typeProjet_id','=','6')->orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('dossier.file_pdfppu',['pro'=>$pro]);
        return $pdf->download('Derogation.pdf');
    }


    public function pdf($id){
       $pro = Projet::find($id);
        $pdf = PDF::loadView('dossier.pdf',['pro'=>$pro]);
        $fileName = $pro->id;
        return $pdf->stream($fileName.'.pdf');
    }



    public function supp(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $nbr= DB::table('projets')->whereNotNull('deleted_at')->count('id');
        if ($nbr == 0) {


            session()->flash('corbeille','corbeille est vide !');
            return redirect('dossier');
        }else{
        $projets = DB::table('projets')->whereNotNull('deleted_at')->get();
        return view('dossier.supp', ['projets' => $projets]);
    }}

     public function restaure($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
       Projet::withTrashed()->find($id)->restore();
       $projets = Projet::all();
       $projets = Projet::orderBy('created_at','desc')->get();
     session()->flash('restaure','le projet est restauré !');
        return redirect('dossier');
    }
    public function PPU(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','1')
         ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.PPU', ['projets' => $projets]);

    }
    public function GPU(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','2')
         ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.GPU', ['projets' => $projets]);
    }

    public function PPR(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','3')
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.PPR', ['projets' => $projets]);
    }
    public function GPR(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','4')
         ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.GPR', ['projets' => $projets]);
    }
    public function ADHOC(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','5')
         ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.ADHOC', ['projets' => $projets]);
    }

    public function derogation(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','commissions.created_at','commissions.type','commissions.obs')
        ->Where('projets.typeProjet_id','=','6')
         ->where('projets.deleted_at', NULL)
        ->orderBy('projets.created_at','desc')->paginate(10);
        return view('dossier.DEROGATION', ['projets' => $projets]);
    }





    public function create(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('dossier.create');
    }

    public function store(Request $request){

        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;
        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->adresse =$request->input('adre');
        $newProjet->num_titre_foncier =$request->input('numt');
        $newProjet->superficie =$request->input('supe');
        $newProjet->hauteur =$request->input('haut');
        $newProjet->c_e_s =$request->input('ces');
        $newProjet->c_o_s =$request->input('cos');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->typeProjet_id =$request->input('type');
        $newProjet->save();
        $historique = new Historique();

         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }

        session()->flash('success','le projet a été bien enregistré !');
        return redirect('dossier');
    }

    public function createPPU(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
return view('dossier.createPPU');
    }
      public function storePPU(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;

        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='1';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->save();
    $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le petit projet urbaine a été bien enregistré !');
        return redirect('dossier/PPU');
    }

      public function createGPU(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('dossier.createGPU');
    }
      public function storeGPU(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;

        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='2';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->save();
        $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
         if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le grand projet urbaine a été bien enregistré !');
        return redirect('dossier/GPU');
    }

     public function createPPR(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('dossier.createPPR');
    }
      public function storePPR(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;
        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='3';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->save();
        $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
         if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le petit projet rurale a été bien enregistré !');
        return redirect('dossier/PPR');
    }

     public function createGPR(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('dossier.createGPR');
    }
      public function storeGPR(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;
        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='4';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->save();
        $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
         if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le grand projet rurale a été bien enregistré !');
        return redirect('dossier/GPR');
    }
  public function createADHOC(){
    if(!Gate::allows('adminOragent_gu')){
        return view('erreur');
    }
    return view('dossier.createADHOC');
    }
     public function storeADHOC(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;
        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->adresse = $request->input('adre');
        $newProjet->num_titre_foncier = $request->input('numt');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->TF = $request->input('tf');
        $newProjet->superficie = $request->input('supe');
        $newProjet->observation = $request->input('obse');
         $newProjet->hauteur =$request->input('haut');
        $newProjet->c_e_s =$request->input('ces');
        $newProjet->c_o_s =$request->input('cos');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='5';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->payement = '0';
        $newProjet->save();
        $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
         if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le projet AD-HOC a été bien enregistré !');
        return redirect('dossier/ADHOC');
    }

    public function createDEROGATION(){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('dossier.createDEROGATION');
    }
     public function storeDEROGATION(Request $request){
        $newProjet = new Projet();
        $newProjet->num =$request->input('num') ;
        $newProjet->province =$request->input('prov') ;
        $newProjet->commune = $request->input('comm');
        $newProjet->consistance = $request->input('cons');
        $newProjet->situation = $request->input('situ');
        $newProjet->petitionnaire =$request->input('peti') ;
        $newProjet->architecte = $request->input('arch');
        $newProjet->requisition = $request->input('requ');
        $newProjet->tf =$request->input('tf') ;
        $newProjet->observation = $request->input('obse');
        $newProjet->vf_technicien = '0';
        $newProjet->vl_agentGU = '0';
        $newProjet->typeProjet_id ='6';
        $newProjet->payement = '0';
         $newProjet->cin = $request->input('cin');
        $newProjet->SurfaceCouverte = $request->input('surf_co');
        $newProjet->SurfaceAmenage = $request->input('surf_am');
        $newProjet->SurfaceParcelle = $request->input('surf_pa');
        $newProjet->save();
        $historique = new Historique();
         $historique->projet_id =$newProjet->id;
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_env = $request->input('date_env');
        $historique->num_env = $request->input('num_env');
        $historique->date_exam =$request->input('date_exam') ;
        $historique->num_exam =$request->input('num_exam') ;
         if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        }
        session()->flash('success','le projet Dérogation a été bien enregistré !');
        return redirect('dossier/derogation');
    }
    //affichage de formulaire pour editer
    public function edit($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.edit',['projet'=>$projet],['commission'=>$commission]);
    }
    public function update(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province =$request->input('prov') ;
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->adresse =$request->input('adre');
        $projet->num_titre_foncier =$request->input('numt');
        $projet->superficie =$request->input('supe');
        $projet->hauteur =$request->input('haut');
        $projet->c_e_s =$request->input('ces');
        $projet->c_o_s =$request->input('cos');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
   if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
            session()->flash('edit','le projet est modifié et instruit dans le cadre des PPR!');

            return redirect('dossier');
        }   }else{
 session()->flash('edit','le projet est modifié !');
return redirect('dossier');
    }
}
    public function editPPU($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editPPU',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updatePPU(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province = $request->input('prov');
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
      session()->flash('edit','le petit projet urbaine est modifié !');
        return redirect('dossier/PPU');
    }
    public function editGPU($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editGPU',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updateGPU(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province = $request->input('prov');
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
 session()->flash('edit','le grand projet urbaine est modifié !');
        return redirect('dossier/GPU');
    }
    public function editPPR($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editPPR',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updatePPR(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province = $request->input('prov');
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
 session()->flash('edit','le petit projet rurale est modifié !');
        return redirect('dossier/PPR');

    }
    public function editGPR($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editGPR',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updateGPR(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province = $request->input('prov');
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {
        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
 session()->flash('edit','le grand projet rurale est modifié !');
        return redirect('dossier/GPR');
    }
    public function editDER($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editDER',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updateDER(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province = $request->input('prov');
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}   if($commission->type == 'Accord de Principe'){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
            session()->flash('edit','le projet de dérogation est modifié et instruit dans le cadre des PPR!');

            return redirect('dossier');
        }else{
 session()->flash('edit','le projet de dérogation est modifié !');
        return redirect('dossier/derogation');
    }}
    public function editADH($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        $commission=Commission::all()->where('projet_id', $id);
        return view('dossier.editADH',['projet'=>$projet],['commission'=>$commission]);
    }
    public function updateADH(Request $request,$id){
        $projet = Projet::find($id);
        $projet->num =$request->input('num') ;
        $projet->province =$request->input('prov') ;
        $projet->commune = $request->input('comm');
        $projet->consistance = $request->input('cons');
        $projet->situation = $request->input('situ');
        $projet->petitionnaire =$request->input('peti') ;
        $projet->architecte = $request->input('arch');
        $projet->requisition = $request->input('requ');
        $projet->tf =$request->input('tf') ;
        $projet->observation = $request->input('obse');
        $projet->adresse =$request->input('adre');
        $projet->num_titre_foncier =$request->input('numt');
        $projet->superficie =$request->input('supe');
        $projet->hauteur =$request->input('haut');
        $projet->c_e_s =$request->input('ces');
        $projet->c_o_s =$request->input('cos');
        $projet->cin =$request->input('cin');
        $projet->SurfaceCouverte=$request->input('surf_co');
        $projet->SurfaceAmenage =$request->input('surf_am');
        $projet->SurfaceParcelle =$request->input('surf_pa');
        $projet->save();
        $nbr=DB::table('commissions')->where('projet_id','=',$id)->count('id');
        if ($nbr != 0) {


        $commission=Commission::where('projet_id','=', $id)->first();
        $commission->created_at =$request->input('date');
        $commission->type =$request->input('type');
        $commission->obs =$request->input('obs');

        $commission->save();
}
 session()->flash('edit','le projet AD-HOC est modifié !');
        return redirect('dossier/ADHOC');
    }




    public function destroy(Request $request,$id){

      $projet = Projet::find($id);
      $projet->delete();

      session()->flash('delete','le projet est supprimé !');
       return redirect('dossier');
    }

    /*********************************** */
    public function commission($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.create',['projet'=>$projet]);
    }

    public function commissionPPU($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createPPU',['projet'=>$projet]);
    }

    public function commissionPPR($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createPPR',['projet'=>$projet]);
    }

    public function commissionGPR($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createGPR',['projet'=>$projet]);
    }


    public function commissionGPU($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createGPU',['projet'=>$projet]);
    }

    public function commissionADHOC($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createADHOC',['projet'=>$projet]);
    }

    public function commissionDERO($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createDERO',['projet'=>$projet]);
    }

    public function commissiontraite($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('commission.createtraite',['projet'=>$projet]);
    }


    /****************************** */

    public function capt($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('historique.capt',['projet'=>$projet]);
    }



  public function captPPU($id){
    if(!Gate::allows('adminOragent_gu')){
        return view('erreur');
    }
        $projet=Projet::find($id);
        return view('historique.captPPU',['projet'=>$projet]);
    }
      public function captGPU($id){
          if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('historique.captGPU',['projet'=>$projet]);
    }
      public function captPPR($id){
          if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('historique.captPPR',['projet'=>$projet]);
    }
    public function captGPR($id){
          if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('historique.captGPR',['projet'=>$projet]);
    }
  public function captADHOC($id){
    if(!Gate::allows('adminOragent_gu')){
        return view('erreur');
    }
    $projet=Projet::find($id);
    return view('historique.captADHOC',['projet'=>$projet]);
    }
      public function captDEROGATION($id){
          if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $projet=Projet::find($id);
        return view('historique.captDEROGATION',['projet'=>$projet]);
    }
    public function details($id){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        } $nbr=DB::table('historiques')->where('projet_id','=',$id)->Where('historiques.deleted_at',NULL)->count('id');

        $projets=DB::table('projets')
        ->leftJoin('historiques','projets.id','=','historiques.projet_id')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.*','historiques.date_arr','historiques.num_arr','historiques.date_exam','historiques.num_exam','historiques.date_env','historiques.num_env','commissions.created_at','commissions.type','commissions.obs')
        ->where('projets.id','=',$id)


        ->get();
        return view('dossier.details', ['projets' => $projets, 'nbr' => $nbr]);
    }


     //-------------Function Search ----------------//
     public function searchAll(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.index',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::all();
            $projets = Projet::orderBy('created_at','desc')->paginate(5);
            return view('dossier.index', ['projets' => $projets]);
            session()->flush();
        }
    }

    public function searchPPU(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','1')
            ->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.PPU',['projets' => $projets]);

        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','1')->paginate(5);
            return view('dossier.PPU', ['projets' => $projets]);

        }
    }

    public function searchGPU(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','2')->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.GPU',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','2')->paginate(5);
            return view('dossier.GPU', ['projets' => $projets]);
            session()->flush();
        }
    }

    public function searchPPR(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','3')->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.PPR',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','3')->paginate(5);
            return view('dossier.PPR', ['projets' => $projets]);
            session()->flush();
        }
    }

    public function searchGPR(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','4')->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.GPR',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','4')->paginate(5);
            return view('dossier.GPR', ['projets' => $projets]);
            session()->flush();
        }
    }

    public function searchADHOC(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','5')->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.ADHOC',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','5')->paginate(5);
            return view('dossier.ADHOC', ['projets' => $projets]);
            session()->flush();
        }
    }

    public function searchDerogation(Request $request){

        \Session::put('cases_fromDate', $request->get('from'));
        \Session::put('cases_toDate', $request->get('to'));
        if($request->get('from') < $request->get('to')){
            $projets = Projet::Where('typeProjet_id','=','6')->whereDate('created_at','>=',$request->get('from'))
            ->whereDate('created_at','<=',$request->get('to'))->paginate(5);
            return view('dossier.DEROGATION',['projets' => $projets]);
            session()->flush();
        } else {
            session()->flash('ErreurRech',' Recherche Non effectué : Voir date !');
            $projets = Projet::Where('typeProjet_id','=','6')->paginate(5);
            return view('dossier.DEROGATION', ['projets' => $projets]);
            session()->flush();
        }
    }




    //----------Functions Excel ---------------//
    public function downloadExcelSearch($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('projets.typeProjet_id','commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')->get()->toArray();


        return Excel::create('Tous_projet', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('projets.typeProjet_id','commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)
            ->get()->toArray();
        return Excel::create('Tous_projet', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }

    public function downloadExcelSearchPPU($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
        ->Where('typeProjet_id','=','1')->get()->toArray();
        return Excel::create('PPU', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
        $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
        ->select('commissions.created_at','commissions.type',
        'commissions.obs',
        'projets.architecte','projets.situation','projets.commune','projets.consistance',
        'projets.petitionnaire','projets.num')
        ->Where('projets.typeProjet_id','=','1')
        ->whereDate('projets.created_at','>=',$from)
        ->whereDate('projets.created_at','<=',$to)->get()->toArray();

        return Excel::create('PPU', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }
    //--------------------------//
    //------------------------------//
    public function downloadExcelSearchGPU($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
            ->Where('projets.typeProjet_id','=','2')->get()->toArray();

        return Excel::create('GPU', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
            ->Where('projets.typeProjet_id','=','2')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)->get()->toArray();
        return Excel::create('GPU', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }

    //------------------------------//
    public function downloadExcelSearchPPR($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
        ->Where('projets.typeProjet_id','=','3')->get()->toArray();

        return Excel::create('PPR', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
            ->Where('projets.typeProjet_id','=','3')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)->get()->toArray();
        return Excel::create('PPR', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }
    //------------------------------//
    public function downloadExcelSearchGPR($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
        ->Where('projets.typeProjet_id','=','4')->get()->toArray();

        return Excel::create('GPR', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','commissions.type',
            'commissions.obs',
            'projets.architecte','projets.situation','projets.commune','projets.consistance',
            'projets.petitionnaire','projets.num')
            ->Where('projets.typeProjet_id','=','4')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)->get()->toArray();
        return Excel::create('GPR', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }
    //------------------------------//
    public function downloadExcelSearchADHOC($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','projets.num',
            'projets.architecte','projets.situation',
            'projets.num_titre_foncier','projets.commune','projets.observation',
            'projets.consistance',
            'projets.petitionnaire')
            ->Where('projets.typeProjet_id','=','5')->get()->toArray();

        return Excel::create('ADHOC', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','projets.num',
            'projets.architecte','projets.situation',
            'projets.num_titre_foncier','projets.commune','projets.observation',
            'projets.consistance',
            'projets.petitionnaire')
            ->Where('projets.typeProjet_id','=','5')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)->get()->toArray();
        return Excel::create('ADHOC', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }
    //------------------------------//
    public function downloadExcelSearchDerogation($type,Request $request)
    {
        $from = Session::get('cases_fromDate', '2018-01-01');
        $to = Session::get('cases_toDate', '2018-01-03');
        if($from = '' && $to = ''){
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','projets.num',
            'projets.architecte','projets.situation',
            'projets.num_titre_foncier','projets.commune','projets.observation',
            'projets.consistance',
            'projets.petitionnaire')
            ->Where('projets.typeProjet_id','=','6')->get()->toArray();

        return Excel::create('Derogation', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }else{
            $data = Projet::leftjoin('commissions','commissions.projet_id','=','projets.id')
            ->select('commissions.created_at','projets.num',
            'projets.architecte','projets.situation',
            'projets.num_titre_foncier','projets.commune','projets.observation',
            'projets.consistance',
            'projets.petitionnaire')
            ->Where('projets.typeProjet_id','=','6')
            ->whereDate('projets.created_at','>=',$from)
            ->whereDate('projets.created_at','<=',$to)->get()->toArray();
        return Excel::create('Derogation', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
        }

    }


    //---------- Import Excel ---------//
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '1',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }
    //---------- Import Excel ---------//
    public function importExcelGPU(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '2',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }
    //---------- Import Excel ---------//
    public function importExcelPPR(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '3',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }
    //---------- Import Excel ---------//
    public function importExcelGPR(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '4',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }
    //---------- Import Excel ---------//
    public function importExcelADHOC(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '5',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }
    //---------- Import Excel ---------//

    public function importExcelDERO(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                 'num' => $value->num,
                 'typeProjet_id' => '6',
                 'commune' => $value->commune,
                 'consistance' => $value->consistance,
                 'situation' => $value->situation,
                 'petitionnaire' => $value->petitionnaire,
                 'architecte' => $value->architecte,
                ];
                if(!empty($arr)){
                    DB::table('projets')->insert($arr);
                }
                $maxValue = Projet::max('id');
                $arr2[] = [
                    'created_at' => $value->created_at,
                    'type' => $value->type,
                    'projet_id' => $maxValue,
                   ];
            }

            if(!empty($arr2)){
                DB::table('commissions')->insert($arr2);
            }
        }

        return back()->with('successImport', 'Insérer enregistrement avec succès.');
    }

    //---------Fiche de taxe PPU ------------------//
    public function captPPU2($id){

            $projet=Projet::find($id);
            return view('ficheDetaxe.captPPU',['projet'=>$projet]);
        }

        public function update2(Request $request,$id){
            $projet = Projet::find($id);
            $projet->SurfaceTaxe = $request->input('sup_a_taxe');
            $projet->gen = '1';
            $projet->save();
            return redirect('dossier/PPU');
        }

        public function captPPU22($id){

                $projet=Projet::find($id);
                return view('ficheDetaxe.captPPU2',['projet'=>$projet]);
        }

        public function update22(Request $request,$id){
            $projet = Projet::find($id);
            $projet->SurfaceTaxe = $request->input('sup_a_taxe');
            $projet->ex = '1';
            $projet->save();
            return redirect('dossier/PPU');
        }

        public function captPPU222($id){

            $projet=Projet::find($id);
            return view('ficheDetaxe.captPPU3',['projet'=>$projet]);
    }

    public function update222(Request $request,$id){
        $projet = Projet::find($id);
        $projet->SurfaceTaxe = $request->input('sup_a_taxe');
        $projet->val = '1';
        $projet->save();
        return redirect('dossier/PPU');
    }
    public function pdf2($id){
        $pro = Projet::find($id);
       $pdf = PDF::loadView('dossier.pdf2',['pro'=>$pro]);
       $name = time(10).'.pdf';
       return $pdf->download($name);
    }
    //---------Fiche de taxe GPU ------------------//
    public function captGPU2($id){

        $projet=Projet::find($id);
        return view('ficheDetaxe.captGPU',['projet'=>$projet]);
    }

    public function update3(Request $request,$id){
        $projet = Projet::find($id);
        $projet->SurfaceTaxe = $request->input('sup_a_taxe');
        $projet->save();
        return redirect('dossier/GPU');
    }
    public function captGPU22($id){

        $projet=Projet::find($id);
        return view('ficheDetaxe.captGPU2',['projet'=>$projet]);
    }

    public function update33(Request $request,$id){
        $projet = Projet::find($id);
        $projet->SurfaceTaxe = $request->input('sup_a_taxe');
        $projet->ex = '1';
        $projet->save();
        return redirect('dossier/GPU');
    }

    public function captGPU222($id){

        $projet=Projet::find($id);
        return view('ficheDetaxe.captGPU3',['projet'=>$projet]);
    }

    public function update333(Request $request,$id){
        $projet = Projet::find($id);
        $projet->SurfaceTaxe = $request->input('sup_a_taxe');
        $projet->val = '1';
        $projet->save();
        return redirect('dossier/GPU');
    }
    public function pdf_GPU_FicheTaxe($id){
        $pro = Projet::find($id);
       $pdf = PDF::loadView('dossier.pdf2',['pro'=>$pro]);
       $name = time(10).'.pdf';
       return $pdf->download($name);
    }

    //---Note de calcul PPU---//
    public function viewPDF_1($id){
        $pro = Projet::find($id);
        $pdf = PDF::loadView('dossier.pdf3',['pro'=>$pro]);
        $fileName = $pro->id;
        return $pdf->download($fileName.'.pdf');
    }
    //---Note de calcul GPU---//



    //---Versement ---//
    public function captPPU4($id){
        $projet=Projet::find($id);
        return view('Versement.captPPU',['projet'=>$projet]);
    }

    public function valider_versement(Request $request,$id){
        $projet = Projet::find($id);
        $projet->val_auto = '1';
        $projet->save();
        return redirect('dossier/PPU');
    }
    //---Versement GPU---//
    public function captGPU4($id){
        $projet=Projet::find($id);
        return view('Versement.captGPU',['projet'=>$projet]);
    }

    public function valider_versementGPU(Request $request,$id){
        $projet = Projet::find($id);
        $projet->val_auto = '1';
        $projet->save();
        return redirect('dossier/GPU');
    }
    public function captPPU_pdf($id){
        $pro = Projet::find($id);
        $pdf = PDF::loadView('dossier.pdf4',['pro'=>$pro]);
        $fileName = $pro->id;
        return $pdf->download($fileName.'.pdf');
    }
    //----Payement------//
    public function valider_payement(Request $request,$id){
        $projet = Projet::find($id);
        $projet->pay = '1';
        $projet->Fact_pay = date('d-m-Y');
        $projet->save();
        $facture = new Facture();
        $facture->projet_id = $projet->id;
        $facture->save();
        return redirect('dossier/PPU');
    }
    //----Facture-----//
    public function captPPU_pdf2(Request $request,$id){
        $pro = Projet::find($id);
        $pdf = PDF::loadView('dossier.pdf_facture',['pro'=>$pro]);
        $fileName = $pro->id;
        return $pdf->download($fileName.'.pdf');
    }

    //---Page Service rendus ---//
    public function all_service(){

        $projets= Projet::leftjoin('factures','factures.projet_id','=','projets.id')
                 ->select('factures.id','factures.projet_id','projets.petitionnaire',
                 'projets.consistance','projets.SurfaceTaxe','projets.observation'
                 ,'projets.Fact_pay','projets.num')
                 ->orderBy('projets.created_at','projets.desc')->get();
         return view('ServiceRendu.all_service', ['projets' => $projets]);
     }

     function fetch_data(Request $request)
     {
      if($request->ajax())
      {
       if($request->from_date != '' && $request->to_date != '')
       {
        $data = Projet::join('factures','factures.projet_id','=','projets.id')
                 ->select('factures.id','factures.projet_id','projets.petitionnaire',
                 'projets.consistance','projets.SurfaceTaxe','projets.observation'
                 ,'projets.Fact_pay','projets.num')
                 ->orderBy('projets.created_at','projets.desc')
          ->whereBetween('projets.Fact_pay', array($request->from_date, $request->to_date))

        ->whereNotNull('projets.SurfaceTaxe')
          ->get();
       }
       else
       {
        $data = Projet::join('factures','factures.projet_id','=','projets.id')
        ->select('factures.id','factures.projet_id','projets.petitionnaire',
        'projets.consistance','projets.SurfaceTaxe','projets.observation'
        ,'projets.Fact_pay','projets.num')
        ->orderBy('projets.created_at','projets.desc')
        ->whereNotNull('projets.SurfaceTaxe')
        ->get();
       }
       echo json_encode($data);
      }
     }

     public function viewPDF_SR(){
         $customPaper = array(0,0,720,1100);
         $pro = Projet::join('factures','factures.projet_id','=','projets.id')
         ->select('factures.id','factures.projet_id','projets.petitionnaire',
         'projets.consistance','projets.SurfaceTaxe','projets.observation'
         ,'projets.Fact_pay','projets.num')
         ->orderBy('projets.created_at','projets.desc')
         ->whereNotNull('projets.SurfaceTaxe')
         ->get();
         $pdf = PDF::loadView('ServiceRendu.file_pdf',['pro'=>$pro])
         ->setPaper($customPaper,'landscape');
         return $pdf->download('les service rendus.pdf');
     }




























}
