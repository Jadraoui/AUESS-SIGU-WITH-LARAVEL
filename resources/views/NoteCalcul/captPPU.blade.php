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
            <span class="contact100-form-title" style="text-align: center;text-decoration: underline;font-family:'Times New Roman';" >
            Note de calcul n° : {{$projet->num}}
            </span>

            <h4> style="font-family:'Times New Roman', Times, serif">Nom et Prénom : {{$projet->petitionnaire}}</h4>
            <h4 style="font-family:'Times New Roman', Times, serif">Nature du projet : {{$projet->consistance}}</h4>
            <h4 style="font-family:'Times New Roman', Times, serif">Situation/Commune :{{$projet->situation}}/{{$projet->commune}}</h4>
            <h4 style="font-family:'Times New Roman', Times, serif">Surface à taxer en M²: {{$projet->SurfaceTaxe}}</h4>
            <?php $montant = $projet->SurfaceTaxe ?>
            <h4 style="font-family:'Times New Roman', Times, serif">Montant Total en DH/TTC: {{3*$montant}}</h4>


		</div>


	<div id="dropDownSelect1"></div>
	@endsection
