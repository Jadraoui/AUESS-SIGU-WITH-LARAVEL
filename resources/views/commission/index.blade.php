@extends('layouts.espace')
@section('link')
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

@endsection

@section('content')

 <body>
  
  <div class="container">
  
  <div class="container box" style="width:1100px; margin-left:-2%;">
    <nav style="position:absolute;margin-top:1%;width:100%;">


      <ul class="ul" style="width:252px; margin-left:35%;">
        <li style="background-color:#5bc0de;text-aligne:center;"><a href="{{url('commission')}}">Tous</a></li>
              <li ><a href="{{url('commission/0/traite')}}">Traités</a></li>
              <li ><a href="{{url('commission/0/non_traite')}}">Non traités</a></li>
            
            </ul>
  </nav><br><br>
       
   <h3></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
     <div class="container">

      
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
               <th style="text-align:center" width="5%">N° de dossier </th>
                            <th  style="text-align:center" width="10%">Type</th>
                            <th  style="text-align:center" width="10%">Pétitionnaire</th>
                            <th  style="text-align:center" width="10%">Architecte</th>
                            <th  style="text-align:center" width="10%">Situation</th>

               <th  style="text-align:center" width="5%">date de commission</th>


              <th  style="text-align:center" width="5%">Avis de la commission</th>
               
              <th  style="text-align:center" width="5%">Observation</th>


            
              </tr>
             </thead>
       <tbody>
           
   @foreach($projets as $projet)
      <tr style="text-align:center;">
        <td>{{ $projet->num }}</td>

        @if ( $projet->typeProjet_id == 1)
        <td>PPU</td> 
        @elseif($projet->typeProjet_id == 2) 
        <td>GPU</td> 
        @elseif($projet->typeProjet_id == 3)
        <td>PPR</td> 
        @elseif($projet->typeProjet_id == 4)
        <td>GPR</td> 
        @elseif($projet->typeProjet_id == 5)
        <td>AD-HOC</td> 
        @else
        <td>Dérogation</td> 
        @endif
        <td>{{ $projet->petitionnaire }}</td>
        <td>{{ $projet->architecte }}</td>

        <td>{{ $projet->situation }}</td>


        <td>{{$projet->created_at}}</td>

        <td>{{ $projet->type }}</td>
        <td>{{ $projet->obs }}</td>



        
      </tr>
      @endforeach
 

       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 <div class="row" style="margin-left: 1%;padding-bottom: 12%;">
  <div class="col-md-12">
    {!! $projets->render() !!}
  </div>
</div>







@endsection

