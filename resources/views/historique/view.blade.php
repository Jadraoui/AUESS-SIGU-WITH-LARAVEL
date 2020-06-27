@extends('layouts.espace')
    <link href="{{ asset('css/style1.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link href="{{ asset('css/style4.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="f.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
	<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

		<link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-12">
      
 <div class="container">
    @if(session()->has('edit_histo'))
    <div class="alert alert-success">
    {{ session()->get('edit_histo')}}
    </div>
    @endif

    @if(session()->has('edit_histo_danger'))
    <div class="alert alert-danger">
    {{ session()->get('edit_histo_danger')}}
    </div>
    @endif
  </div>
@foreach($errors->all() as $error)
	<li> {{$error}} </li>
    @endforeach
  
@foreach($historiques as $hist)
 <?php  $num=$hist->num; ?>
    @endforeach
    <div class="container box" style="width:1100px; margin-left:-2%;">

<h2 style="text-align:center;font-family:timesroman;"><a href="{{url('dossier')}}" style="float: left;margin-left: 2%;"><button type="button" class="btn btn-primary" ><i class="glyphicon glyphicon-circle-arrow-left">  </i></button></a>  Historique du projet N° {{$num}}</h2>

 <br>
 <div class="panel-body">
     <div class="table-responsive" >
      <table class="table table-striped table-bordered" cellpadding="2" cellspacing="0" style="border-color: gray; width: 100%;">
          <thead >
      <tr>
        <th colspan="2"  style="border-color: gray;height: 50px;text-align: center;font-size: 18px;"> Arrivée </th>
            <th colspan="2" style="border-color: gray;height: 50px;text-align: center;font-size: 18px;"> Examen par la commission </th>
            <th colspan="2" style="border-color: gray;height: 50px;text-align: center;font-size: 18px;" > Envoi à la commune </th> </tr>
    <tr>
       <td style="border-color: gray;text-align: center;width: 12%;font-family: Times New Roman;">
        Date d'arrivée
       </td>
       <td style="border-color: gray;text-align: center;width: 12%;font-family: Times New Roman;">
        N° d'arrivée
       </td>
       <td style="border-color: gray;text-align: center;font-family: Times New Roman;">
        Date d'examen par la commission
       </td>
       <td style="border-color: gray;text-align: center;font-family: Times New Roman;">
        N° d'examen par la commission
       </td>
       <td style="border-color: gray;text-align: center;font-family: Times New Roman;">
        Date d'envoi à la commune
       </td>
       <td style="border-color: gray;text-align: center;font-family: Times New Roman;">
        N° d'envoi à la commune
       </td>
       <td style="border-color: gray;text-align: center;font-family: Times New Roman;">
        Action
       </td>
   
      </tr>
    </thead>
    <tbody>
      @foreach ($historiques as $historique)
      <tr>
       <td style="border-color: gray;height: 52px;text-align: center;">
       {{$historique->date_arr}}
       </td>
       <td style="border-color: gray;text-align: center;">
            {{$historique->num_arr}}
       </td>
       <td style="border-color: gray;text-align: center;">
            {{$historique->date_exam}}
       </td>
       <td style="border-color: gray;text-align: center;">
            {{$historique->num_exam}}
       </td>
       <td style="border-color: gray;text-align: center;">
            {{$historique->date_env}}
       </td>
       </td>
       <td style="border-color: gray;text-align: center;">
            {{$historique->num_env}}
       </td>
       <td style="border-color: gray;text-align: center;">
           <a href=" {{url('historique/'.$historique->id.'/edit')}} "> <button type="submit" class="glyphicon glyphicon-pencil" style="color:blue;"></button>
            </a>
      
     &nbsp;&nbsp;
            <form action=" {{url('historique/'.$historique->id)}} " method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="glyphicon glyphicon-trash  " style="color:blue;"></button>
         </form>
       </td>
      </tr> </tbody>  @endforeach
    </table>

    
    </form>

    

	<div id="dropDownSelect1"></div>
</div></div>
</div>
  @endsection