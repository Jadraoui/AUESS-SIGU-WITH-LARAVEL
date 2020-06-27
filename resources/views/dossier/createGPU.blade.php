@extends('layouts.espace')


		<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

@section('content')
@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
		<form action="{{url('dossier/storeGPU')}}" method="post" class="contact100-form validate-form" >
				@Csrf
				<span class="contact100-form-title" style="text-align: center;">
					Fiche d'analyse : Grand Projet Urbaine
				</span>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
						<span class="label-input100">Numéro de projet *</span>
                        <input class="input100" type="text" name="num" placeholder="Entrer le numéro.." required=""
                        oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">
					</div>

						<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
							<span class="label-input100">Province *</span>
							<input class="input100" type="text" name="prov" placeholder="Entrer la province" required="">
						</div>



					<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
								<span class="label-input100">Commune *</span>
								<input class="input100" type="text" name="comm" placeholder="Entrer la commune.." required="">
							</div>

						<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
							<span class="label-input100">Consistance du projet *</span>
							<input class="input100" type="text" name="cons" placeholder="Entrer la consistance du projet" required="">
						</div>


				<div class="wrap-input100" data-validate=" required">
					<span class="label-input100">Situation</span>
					<input class="input100" type="text" name="situ" placeholder="Entrer la situation du projet" required="">
				</div>


				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="is required">
					<span class="label-input100">Pétitionnaire *</span>
					<input class="input100" type="text" name="peti" placeholder="Entrer le nom complet du pétitionnaire" required="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate=" required">
					<span class="label-input100">CIN </span>
					<input class="input100" type="text" name="cin" placeholder="Entrer le CIN du pétitionnaire">
				</div>
<div class="wrap-input100" >
							<span class="label-input100">Architecte *</span>
							<input class="input100" type="text" name="arch" placeholder="Entrer le nom de l'Architecte" required="">
						</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Réquisition</span>
					<input class="input100" type="text" name="requ" placeholder="Référence foncière">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" ">
					<span class="label-input100">TF</span>
					<input class="input100" type="text" name="tf" placeholder="Référence foncière">
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Observation</span>
					<textarea class="input100" name="obse" placeholder="Observation ..."></textarea>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Surface Couverte</span>
					<input class="input100" type="text" name="surf_co" placeholder="Entrer la surface couverte">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input">
						<span class="label-input100">Surface Amenage</span>
						<input class="input100" type="text" name="surf_am" placeholder="Entrer la surface amenage">
					</div>

					<div class="wrap-input100 rs1-wrap-input100 validate-input" >
						<span class="label-input100">Surface Parcelle</span>
						<input class="input100" type="text" name="surf_pa" placeholder="Enter la Surface parcelle">
					</div>

	<table border="1" cellpadding="2" cellspacing="0" style="width:100%;border: 1px solid gainsboro	;" class="table table-striped table-bordered" >
										<tr><th colspan="2" style="text-align:center;height:50px;border: 1px solid gainsboro	;"> Arrivée </th>
											<th colspan="2" style="text-align:center;height:50px;border: 1px solid gainsboro	;"> Examen par la commission </th>
											<th colspan="2" style="text-align:center;height:50px;border: 1px solid gainsboro	;"> Envoi à la commune </th> </tr>
									<tr>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										Date d'arrivée
									   </td>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										N° d'arrivée
									   </td>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										Date d'examen par la commission
									   </td>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										N° d'examen par la commission
									   </td>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										Date d'envoi à la commune
									   </td>
									   <td style="text-align: center;width:15%;border: 1px solid gainsboro	;">
										N° d'envoi à la commune
									   </td>
									  </tr>
									  <tr>
									   <td style="text-align:center;padding:1%;border: 1px solid gainsboro	;">
									  	<input class="" type="date" name="date_arr" style="width: 100px;height: 53px;margin-top: 12px; background: #f2f2f2;text-align: center;">
									   </td>
									   <td style="text-align:center; border: 1px solid gainsboro	;">
                                            <input class="input100" type="text" name="num_arr"
                                             oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">

									   </td>
									   <td style="text-align:center; border: 1px solid gainsboro	;">
										<input class="" type="date" name="date_exam" style="width: 100px;height: 53px;margin-top: 12px;background: #f2f2f2;text-align: center;">

									   </td>
									   <td style="text-align:center; border: 1px solid gainsboro	;">
                                            <input class="input100" type="text" name="num_exam"
                                            oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">

									   </td>
									   <td style="text-align:center; border: 1px solid gainsboro	;">
											<input class="" type="date" name="date_env" style="width: 100px;height: 53px;margin-top: 12px;background: #f2f2f2;text-align: center;">

									   </td>
									   </td>

									   <td style="text-align:center;border: 1px solid gainsboro	;">
                                            <input class="input100" type="text" name="num_env"
                                            oninput="this.value = this.value.replace(/[^0-9./]/g, '').replace(/(\..*)\./g, '$1');">

									   </td>
									  </tr>
									</table>



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
