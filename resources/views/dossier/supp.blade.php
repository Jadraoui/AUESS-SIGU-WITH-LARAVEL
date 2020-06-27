@extends('layouts.espace')
@section('link')
	<link href="{{ asset('css/style1.css') }}" type="text/css" rel="stylesheet" id="main-style">
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" id="main-style">
  <link href="{{ asset('css/style4.css') }}" type="text/css" rel="stylesheet" id="main-style">

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" id="main-style">

  <link href="{{ asset('vendor/animate/animate.css') }}" type="text/css" rel="stylesheet" id="main-style">

  <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet" id="main-style">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="f.js"></script>
    @endsection
    
    @section('content')
<div class="container">
   @if(session()->has('success'))
   <br><br>
  <div class="alert alert-success"> 
   {{ session()->get('success')}}
  </div>
  @endif  
  <h2 style="text-align: center;">Liste des projets supprimés</h2>

 
  <div id="table" class="table-editable"> 
    
    <table class="table" style="width:1100px; margin-left:-2%;">
       
        <tr>
        <th style="text-align:center;">N° de projet</th><br>
        <th style="text-align:center;">Type</th><br>
        <th style="text-align:center;">Date de suppression</th><br>
        <th style="text-align:center;">Province</th><br>
        <th style="text-align:center;">Commune</th>
        <th style="text-align:center;"> Nature</th>
        <th style="text-align:center;">Situation</th>
        <th style="text-align:center;">Pétitionnaire</th>
        <th style="text-align:center;">Architecte</th>
      </tr>      
      @foreach($projets as $projet)
      <tr style="text-align:center;">
        <td contenteditable="true">{{ $projet->num }}</td>
        @if ( $projet->typeProjet_id == 1)
        <td contenteditable="true">PPU</td> 
        @elseif($projet->typeProjet_id == 2)
        <td contenteditable="true">GPU</td> 
        @elseif($projet->typeProjet_id == 3)
        <td contenteditable="true">PPR</td> 
        @elseif($projet->typeProjet_id == 4)
        <td contenteditable="true">GPR</td> 
        @else
        <td contenteditable="true">AD-HOC</td> 
        @endif
       
         <td contenteditable="true">{{ $projet->deleted_at }}</td>
        <td contenteditable="true">{{ $projet->province }}</td>
        <td contenteditable="true">{{ $projet->commune }}</td>
        <td contenteditable="true">{{ $projet->consistance }}</td>
        <td contenteditable="true">{{ $projet->situation }}</td>
        <td contenteditable="true">{{ $projet->petitionnaire }}</td>
        <td contenteditable="true">{{ $projet->architecte }}</td>
        
        <td><a href=" {{url('dossier/'.$projet->id.'/restaure')}} "> <button type="submit" class="glyphicon glyphicon-repeat" style="color:blue;"></button>
            </a>
            </td>
         
        
      </tr>
      @endforeach
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td contenteditable="true">Untitled</td>
        <td contenteditable="true">undefined</td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
        <td>
          <span class="table-up glyphicon glyphicon-arrow-up"></span>
          <span class="table-down glyphicon glyphicon-arrow-down"></span>
        </td>
      </tr>
    </table>
  </div>
  

</div>

@endsection
    
   