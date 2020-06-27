@extends('layouts.espace')
	<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
@section('content')

@foreach($errors->all() as $error)
	<li> {{$error}} </li>
    @endforeach

    @if(session()->has('dangerhistorique'))
<div class="alert alert-danger">
{{ session()->get('dangerhistorique')}}
</div>
@endif
	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
            <form action="{{url('historique/'.$projet->id.'/PPU')}}" method="POST" class="contact100-form validate-form" >
                <input type="hidden" name="_method" value="GET">
				@Csrf

				<span class="contact100-form-title" style="text-align: center;">
					Ajouter historique pour le projet N° {{$projet->num}}
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">Date d'arrivée </span>
					<input class="input100" type="date" name="date_arr" placeholder="JJ/MM/YYYY">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">N° d'arrivée </span>
                    <input class="input100" type="text" name="num_arr" placeholder="N° ..."
                    oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">Date d'examen </span>
					<input class="input100" type="date" name="date_exa" placeholder="JJ/MM/YYYY">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">N° d'examen </span>
                    <input class="input100" type="text" name="num_exa" placeholder="N° ..."
                    oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">Date d'envoi commune </span>
					<input class="input100" type="date" name="date_env" placeholder="JJ/MM/YYYY">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">N° d'envoi commune </span>
                    <input class="input100" type="text" name="num_env" placeholder="N° ..."
                    oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');"
                    >
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
