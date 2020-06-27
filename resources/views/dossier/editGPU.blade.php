@extends('layouts.espace')
@section('link')

		<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		@endsection

		@section('content')

	@foreach($errors->all() as $error)
	<li> {{$error}} </li>
	@endforeach
	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
		<form action="{{url('dossier/'.$projet->id.'/GPU')}}" method="post" class="contact100-form validate-form" >
			<input type="hidden" name="_method" value="PUT">

				@Csrf
				<span class="contact100-form-title" style="text-align: center; ">
				Modifier la fiche d'analyse: Grand projet urbaine
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
						<span class="label-input100">Numéro de projet *</span>
						<input class="input100" type="text"  style="border:1px #3c8dbc solid;" name="num" value="{{$projet->num}}" required="">
					</div>
					

				<div class="wrap-input100 rs1-wrap-input100 validate-input">
					<span class="label-input100">Province *</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="prov" value="{{$projet->province}} ">
				</div>
	<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
						<span class="label-input100">Commune *</span>
						<input class="input100" type="text"  style="border:1px #3c8dbc solid;" name="comm" value="{{$projet->commune}}">
					</div>
					

				<div class="wrap-input100 rs1-wrap-input100 validate-input">
					<span class="label-input100">Consistance du projet *</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="cons" value="{{$projet->consistance}} ">
				</div>

			

				<div class="wrap-input100">
					<span class="label-input100">Situation</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="situ" value="{{$projet->situation}}">
				</div>

				
				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Pétitionnaire *</span>
					<input class="input100" type="text"style="border:1px #3c8dbc solid;" name="peti" value="{{$projet->petitionnaire}}">
				</div>
<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
						<span class="label-input100">CIN *</span>
						<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="cin" value="{{$projet->cin}}">
					</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input">
					<span class="label-input100">Architecte *</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;"name="arch" value="{{$projet->architecte}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Réquisition</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;"name="requ" value="{{$projet->requisition}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">TF</span>
					<input class="input100" type="text" style="border:1px #3c8dbc solid;"name="tf" value="{{$projet->tf}}">
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Remarque</span>
					<textarea class="input100" style="border:1px #3c8dbc solid;"name="obse">{{$projet->observation}}</textarea>
				</div>
				

				
			

								<div class="wrap-input100 rs1-wrap-input100 validate-input" >
									<span class="label-input100">Surface Couverte</span>
									<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="surf_co" value="{{$projet->SurfaceCouverte}}">
								</div>

								<div class="wrap-input100 rs1-wrap-input100 validate-input" >
									<span class="label-input100">Surface Amenage</span>
									<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="surf_am" value="{{$projet->SurfaceAmenage}}">
								</div>
								
								<div class="wrap-input100 rs1-wrap-input100 validate-input" >
									<span class="label-input100">Surface Parcelle</span>
									<input class="input100" type="text" style="border:1px #3c8dbc solid;" name="surf_pa" value="{{$projet->SurfaceParcelle}}">
								</div>

				
								@foreach ($commission as $comm)
									
								
								<div class="wrap-input100 rs1-wrap-input100 validate-input" >
									<span class="label-input100">Date de résultat de commission</span>
									<input class="input100" type="date" style="border:1px #3c8dbc solid;" name="date" value="{{$comm->date_comm}}">
								</div>
								
								<div class="wrap-input100 " data-validate=" required" value="{{$comm->type}}">
									<input type="radio" name="res" value="Accord de Principe">Accord de Principe &nbsp &nbsp &nbsp
									<input type="radio" name="res" value="Refus"> Refus &nbsp &nbsp &nbsp &nbsp
									<input type="radio" name="res" value="Sursis"> Sursis &nbsp
								</div><br>
								<div class="wrap-input100 rs1-wrap-input100 validate-input" >
									<span class="label-input100">Observation</span>
									<textarea class="input100" name="obs" style="border:1px #3c8dbc solid; width:100%;height:10px;"  cols="30" rows="10" value="{{$comm->obs}}" ></textarea>
								</div>
								@endforeach

								<div class="box-footer" style="width:100%;">
									<a href="{{ url('dossier')}}" class='btn btn-info' style="width:100px; margin-top:0.5%;">Annuler</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
								  <button type="submit" class="btn btn-info" style="float:right;width:100px;">Enregistrer</button>
								</div>
			</form>
		</div>


	<div id="dropDownSelect1"></div>

	@endsection
