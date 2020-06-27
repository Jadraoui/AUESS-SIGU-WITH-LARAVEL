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
                        N° Dossier : {{$projet->num}}
            </span>
            <table class="table">
                    <thead>
                      <tr>
                        <th>Nom/Prénom </th>
                        <th>CIN</th>
                        <th>Adresse</th>
                        <th>Situation/Commune </th>
                        <th>Nature du projet</th>
                        <th>Surface Couverte</th>
                        <th>Surface Aménagée</th>
                        <th>Superficie Parcelle </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$projet->petitionnaire}}</td>
                        <td>{{$projet->cin}}</td>
                        <td>{{$projet->adresse}}</td>
                        <td>{{$projet->situation}}/{{$projet->commune}}</td>
                        <td>{{$projet->consistance}}</td>
                        <td>{{$projet->SurfaceCouverte}}</td>
                        <td>{{$projet->SurfaceAmenage}}</td>
                        <td>{{$projet->SurfaceParcelle}}</td>
                      </tr>
                    </tbody>
                  </table>


            <form action="{{url('projetGPU/'.$projet->id)}}" method="post" class="contact100-form validate-form" >
                <input type="hidden" name="_method" value="PUT">
				@Csrf
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
                        <h3 style="font-family:'Times New Roman', Times, serif">Superficie à Taxer : </h3>
                        <input class="input100" type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                         name="sup_a_taxe" value="{{$projet->SurfaceTaxe}}" required>
                </div>


				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							Envoyer pour examiner
						</button>
					</div>
				</div>
			</form>
		</div>


	<div id="dropDownSelect1"></div>
	@endsection
