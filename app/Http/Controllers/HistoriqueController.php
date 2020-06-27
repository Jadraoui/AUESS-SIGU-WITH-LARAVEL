<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historique;
use Gate;
use DB;

class HistoriqueController extends Controller
{
    public function create(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
             session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
        return redirect('historique/capt');
        }

    }
public function createPPU(Request $request,$id){
    if(!Gate::allows('adminOragent_gu')){
        return view('erreur');
    }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
      session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captPPU');
        }
    }

    public function createGPU(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
     session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captGPU');
        }
    }

    public function createPPR(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
       session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captPPR');
        }
    }

    public function createGPR(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
     session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captGPR');
        }
    }

    public function createADHOC(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
        session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captADHOC');
        }
    }

    public function createDEROGATION(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        $historique = new Historique();
        $historique->date_arr =$request->input('date_arr') ;
        $historique->num_arr = $request->input('num_arr');
        $historique->date_exam = $request->input('date_exa');
        $historique->num_exam = $request->input('num_exa');
        $historique->date_env =$request->input('date_env') ;
        $historique->num_env =$request->input('num_env') ;
        $historique->projet_id =$id;
        if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
       session()->flash('successhistorique','L\'historique a été bien enregistré !');
        return redirect('dossier');
        }else{
            session()->flash('dangerhistorique','Les champs vides!! L\'historique n\'est pas bien enregistré !');
            return redirect('historique/captDEROGATION');
        }
    }
    public function view($id){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }
        $nbr=DB::table('historiques')->where('projet_id','=',$id)->Where('historiques.deleted_at',NULL)->count('id');
        if($nbr!=0){
        $historiques = DB::table('historiques')->join('projets', 'historiques.projet_id', '=', 'projets.id')->select('historiques.*', 'projets.num')->Where('historiques.deleted_at',NULL)->Where('historiques.projet_id','=',$id)->get();
        return view('historique.view', ['historiques' => $historiques]);
    }else{
        session()->flash('erreur_view','il n\'y a aucune historique !');
        return redirect('dossier');
    }
}

     public function edit($id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
$historique=Historique::find($id);
return view('historique.edit',['historique'=>$historique]);
    }
    public function update(Request $request,$id){
$historique = Historique::find($id);
$historique->date_arr = $request->input('date_arr');
$historique->num_arr = $request->input('num_arr');
$historique->date_env = $request->input('date_env');
$historique->num_env = $request->input('num_env');
$historique->date_exam =$request->input('date_exam') ;
$historique->num_exam = $request->input('num_exam');
 if ($historique->date_arr !='' ||$historique->num_arr !='' ||$historique->date_env !='' ||$historique->num_env !='' ||$historique->date_exam !='' ||$historique->num_exam !='') {
           $historique->save();
       session()->flash('edit_histo','L\'historique est modifiée !');
        return redirect('historique/'.$historique->projet_id.'/view');
        }else{
            session()->flash('edit_histo_danger','les champs vides!! L\'historique n\'est modifiée !');
return redirect('historique/'.$historique->projet_id.'/view');
    }}
    public function destroy(Request $request,$id){
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
      $historique = Historique::find($id);
      $i=$historique->projet_id;
      $historique->delete();
      return redirect('historique/'.$i.'/view');
    }
}
