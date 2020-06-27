@extends('layouts.espace')
	<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
@section('content')


<div class="container-contact100" >
	<div class="wrap-contact100">

            <form action="{{ url('commission/'.$projet->id.'/storeDERO')}}" method="POST" class="contact100-form validate-form" >
                <input type="hidden" name="_method" value="GET">
				@Csrf
				
				<span class="contact100-form-title" style="text-align: center;">
					Résultat des commissions
				</span>

				<div class="wrap-input100" data-validate=" required">
					<span class="label-input100">Date *</span>
					<input class="input100" style="border:1px #3c8dbc solid; width:100%;height:50px;" type="date" name="date" placeholder="JJ/MM/YYYY">
				</div>
				

				<div class="wrap-input100 " data-validate=" required">
					<input type="radio" name="res" value="Accord de Principe">Accord de Principe &nbsp &nbsp &nbsp
  					<input type="radio" name="res" value="Refus"> Refus &nbsp &nbsp &nbsp &nbsp
 					<input type="radio" name="res" value="Sursis"> Sursis &nbsp
				</div><br>

				<div class="wrap-input100" data-validate=" required">
					<span class="label-input100">Observation</span>
					<textarea class="input100" name="obs" style="border:1px #3c8dbc solid; width:100%;height:10px;"  cols="30" rows="10" placeholder="Observation"></textarea>
				</div>

			
				<div class="box-footer" style="width:100%;">
					<a href="{{ url('dossier')}}" class='btn btn-info' style="width:100px; margin-top:0.5%;">Annuler</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<button type="submit" class="btn btn-info" style="float:right;width:100px;">Enregistrer</button>
				</div>
				<!-- /.box-footer -->
			  </form>
			</div>
			</form>
		</div>
		


	@endsection