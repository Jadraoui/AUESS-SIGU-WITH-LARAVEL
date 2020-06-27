@extends('layouts.espace')
	<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
@section('content')

@foreach($errors->all() as $error)
	<li> {{$error}} </li>
	@endforeach
	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
		<form action="{{url('historique/'.$historique->id.'/up')}}" method="post" class="contact100-form validate-form" >
			<input type="hidden" name="_method" value="PUT">

				@Csrf
				
				<span class="contact100-form-title" style="text-align: center;">
					Modifier l'historique
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Date d'arrivée </span>
					<input class="input100" type="date" name="date_arr" value="{{$historique->date_arr}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">N° d'arrivée </span>
					<input class="input100" type="text" name="num_arr" value="{{$historique->num_arr}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Date d'examen </span>
					<input class="input100" type="date" name="date_exam" value="{{$historique->date_exam}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">N° d'examen </span>
					<input class="input100" type="text" name="num_exam" value="{{$historique->num_exam}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Date d'envoi commune </span>
					<input class="input100" type="date" name="date_env" value="{{$historique->date_env}}">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">N° d'envoi commune </span>
					<input class="input100" type="text" name="num_env" value="{{$historique->num_env}}">
				</div>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							Enregistrer
						</button>
					</div>
				</div>
			</form>
		</div>


	<div id="dropDownSelect1"></div>
	@endsection