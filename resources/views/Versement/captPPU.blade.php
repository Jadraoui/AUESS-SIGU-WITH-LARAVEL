@extends('layouts.espace')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">


        @section('content')

	    <div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		    <div class="wrap-contact100">
                <div>
                    <h2>AUTORISATION DE VERSEMENT N° :{{$projet->num}}</h2>
                </div>
                <br><br>
                <h4>N° N.C :......./{{$projet->created_at->year}}</h4>
                <p>Je soussigné Directeur de l'Agence Urbaine d'Essaouira,autorise :</p>
                <h4>Nom et prénom : {{$projet->petitionnaire}}</h4>
                <h4>N° CIN : {{$projet->cin}}</h4>
                <h4>Adresse : {{$projet->adresse}}</h4>

                <p>A verser la somme de (En chiffres) : {{$projet->SurfaceTaxe}} Dhs TTC</p>
                <p>(En Lettres) : ..................................................<br>
                     Dirhames Toutes Taxes Comporises</p>
                <br>
                <p>Au compte de la trésorerie Provinciale de l'Agence Urbaine d'Essaouira.</p>
                <br>
                <br>
                Compte RIB n° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                3.1.0.2.4.0.1.0.3.1.0.2.4.0.0.4.3.9.4.1.0.1.2.0
                <br><br>
                <p>Fait à Essaouira, le</p>
                <form action="{{url('Versement/'.$projet->id)}}" method="post" class="contact100-form validate-form" >
                    <input type="hidden" name="_method" value="PUT">
                    @Csrf
                    <div class="container-contact100-form-btn">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn">
                                Valider
                            </button>
                        </div>
                    </div>
                </form>
            </div>
	    </div>
@endsection

