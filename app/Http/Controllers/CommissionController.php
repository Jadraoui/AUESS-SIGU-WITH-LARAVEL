<?php

namespace App\Http\Controllers;
use Gate;
use App\Commission;
use App\Projet;
use DB;

use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }

        $projets = DB::table('projets')
        ->leftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.num','projets.petitionnaire','projets.architecte','projets.situation','projets.typeProjet_id','commissions.created_at','commissions.type','commissions.obs')
        ->where('projets.deleted_at', NULL)

        ->paginate(10);
        return view('commission.index', ['projets' => $projets]);
    }


    public function traite(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }

        $projets = DB::table('projets')
        ->Join('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.num','projets.petitionnaire','projets.architecte','projets.situation','projets.typeProjet_id','commissions.created_at','commissions.type','commissions.obs')
        ->where('projets.deleted_at', NULL)

        ->paginate(10);
        return view('commission.traite', ['projets' => $projets]);
    }

    public function nontraite(){
        if(!Gate::allows('adminOrdirOrag_guOrarchiOrval_gu_sf')){
            return view('erreur');
        }

        $projets = DB::table('projets')
        ->LeftJoin('commissions','projets.id','=','commissions.projet_id')
        ->select('projets.id','projets.petitionnaire','projets.architecte','projets.situation','projets.num','projets.typeProjet_id','commissions.created_at','commissions.type','commissions.obs')
        ->where('projets.deleted_at', NULL)

        ->paginate(10);
        return view('commission.non_traite', ['projets' => $projets]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.create');
    }
    public function store(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
        $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
            session()->flash('successcommission','La commission a été bien enregistré et le projet de dérogation est instruit dans le cadre des PPR!');

            return redirect('dossier');
        }   }else{
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier');}

    }

    public function createPPU()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createPPU');
    }
    public function storePPU(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        $projet->commission = '1';
        $projet->save();
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
        }}
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/PPU');

    }

    public function createPPR()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createPPR');
    }
    public function storePPR(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        $projet->commission = '1';
        $projet->save();
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
        }}
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/PPR');

    }

    public function createGPU()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createGPU');
    }
    public function storeGPU(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        $projet->commission = '1';
        $projet->save();
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
        }}
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/GPU');

    }

    public function createGPR()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createGPR');
    }
    public function storeGPR(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        $projet->commission = '1';
        $projet->save();
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
        }}
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/GPR');

    }

    public function createADHOC()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createADHOC');
    }
    public function storeADHOC(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
        if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        $projet->commission = '1';
        $projet->save();
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
        }}
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/ADHOC');

    }

    public function createDERO()
    {
        if(!Gate::allows('adminOragent_gu')){
            return view('erreur');
        }
        return view('commission.createDERO');
    }
    public function storeDERO(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
         $commission->save();
         if($commission->type == 'Accord de Principe'){
        $projet=Projet::find($id);
        if($projet->typeProjet_id == 6){
            $pro=Projet::find($id);
            $pro->typeProjet_id='3';
            $pro->save();
            session()->flash('successcommission','La commission a été bien enregistré et le projet de dérogation est instruit dans le cadre des PPR!');

            return redirect('dossier');
        }   }else{
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('dossier/derogation');

    }}


    public function createtraite()
    {
        if(!Gate::allows('adminOragent_guOrarchi')){
            return view('erreur');
        }
        return view('commission.createtraite');
    }
    public function storetraite(Request $request,$id)
    {
        $commission = new Commission();
        $commission->created_at =$request->input('date') ;
        $commission->type= $request->input('res');
        $commission->obs = $request->input('obs');
        $commission->projet_id =$id;
        $commission->save();
         session()->flash('successcommission','La commission a été bien enregistré !');

         return redirect('commission/0/traite');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
