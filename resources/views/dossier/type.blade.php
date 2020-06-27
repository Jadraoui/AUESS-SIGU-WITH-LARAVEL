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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @endsection

    @section('content')

<div class="container">

   @if(session()->has('success'))
   <br><br>
  <div class="alert alert-success">
   {{ session()->get('success')}}
  </div>
  @endif
  <div class="container">

        <div class="row pull-right">
            <a href="{{ route('view-pdf-ppu') }}" type="button" class="btn btn-success">Voir PDF</a>
            <a href="{{ route('view-pdf-ppu') }}" type="button" class="btn btn-success">Telecharger PDF</a>
            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Telecharger Excel xlsx</button></a>
            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Telecharger CSV</button></a>

        </div>
  <h2 style="text-align: center;">Liste des projets</h2>


  <div id="table" class="table-editable">

    <table class="table" style="width:90%">
        <nav style="position:absolute;margin-top:1%;width:100%;">


                <ul class="ul">
                    <li><a href="{{url('dossier')}}">Tous</a></li>
                    <li><a href="{{url('dossier/PPU')}}">PPU</a></li>
                    <li><a href="{{url('dossier/GPU')}}">GPU</a></li>
                    <li><a href="{{url('dossier/PPR')}}">PPR</a></li>
                    <li><a href="{{url('dossier/GPR')}}">GPR</a></li>
                    <li><a href="{{url('dossier/ADHOC')}}">ADHOC</a></li>
                    <li><a href="{{url('dossier/derogation')}}">Dérogation</a></li>
                  </ul>
        </nav>
        <tr>
        <th style="text-align:center;">N° de projet</th><br>

        <th style="text-align:center;">Date de création</th><br>
        <th style="text-align:center;">Historique</th><br>
        <th style="text-align:center;">Détails</th><br>
        <th style="text-align:center;">Editer</th>
        <th style="text-align:center;">Supprimer</th>
        <th style="text-align:center;">Fiche technique</th>
      <th style="text-align:center;"><a href="{{ url('dossier/create') }}"><span class="table-add glyphicon glyphicon-plus" style="font-size: 18px;color: green;"></span></a></th>
      </tr>
      @foreach($projets as $projet)
      <tr style="text-align:center;">
        <td contenteditable="true">{{ $projet->id }}/{{$projet->created_at->year}}</td>


        <td contenteditable="true">{{$projet->created_at->day}}/{{$projet->created_at->month}}/{{$projet->created_at->year}}</td>
         <td><a href="{{url('historique/'.$projet->id.'/capt')}}">
          <button type="submit" class="table-add glyphicon glyphicon-plus" style="color:blue;"></button></a>&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;
          <a href="{{url('historique/'.$projet->id.'/view')}}">
            <button type="submit" class="	glyphicon glyphicon-eye-open" style="color:blue;"></button></a>
        </td>
        <td><a href=" {{url('dossier/'.$projet->id.'/details')}} "> <button type="submit" class="glyphicon glyphicon-info-sign" style="color:blue;"></button>
            </a>

          </td>
        <td><a href=" {{url('dossier/'.$projet->id.'/edit')}} "> <button type="submit" class="glyphicon glyphicon-pencil" style="color:blue;"></button>
            </a>

          </td>
        <td>  <form action=" {{url('dossier/'.$projet->id)}} " method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="glyphicon glyphicon-trash	" style="color:blue;"></button>
         </form></td>
         <td><a target="_blank" href="{{url('dossier/'.$projet->id.'/pdf')}}">
          <button type="submit" class="glyphicon glyphicon-print" style="color:blue;"></button></a>
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


