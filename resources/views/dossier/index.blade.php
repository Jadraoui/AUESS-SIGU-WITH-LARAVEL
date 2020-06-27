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
    @if(session()->has('success'))
    <div class="alert alert-success">
    {{ session()->get('success')}}
    </div>
    @endif
    @if(session()->has('successhistorique'))
    <div class="alert alert-success">

    {{ session()->get('successhistorique')}}
    </div>
    @endif

 @if(session()->has('edit'))
    <div class="alert alert-success">
    {{ session()->get('edit')}}
    </div>
  @endif
     @if(session()->has('erreur_view'))
    <div class="alert alert-danger">

    {{ session()->get('erreur_view')}}
    </div>
    @endif

     @if(session()->has('corbeille'))
    <div class="alert alert-danger">

    {{ session()->get('corbeille')}}
    </div>
    @endif
    @if(session()->has('successcommission'))
    <div class="alert alert-success">
    {{ session()->get('successcommission')}}
    </div>
  @endif
   @if(session()->has('delete'))
    <div class="alert alert-success">
    {{ session()->get('delete')}}
    </div>
  @endif


   @if(session()->has('restaure'))
    <div class="alert alert-success">
    {{ session()->get('restaure')}}
    </div>
  @endif
  @if(session()->has('ErreurRech'))
  <div class="alert alert-danger">
   {{ session()->get('ErreurRech')}}
  </div>
  @endif


    <div class="container box" style="width:1100px; margin-left:-2%;">

          <nav style="position:absolute;margin-top:1%;width:100%;">
                <ul class="ul">
                    <li style="background-color:#5bc0de;text-aligne:center;"><a href="{{url('dossier')}}">Tous</a></li>
                    <li><a href="{{url('dossier/PPU')}}">PPU</a></li>
                    <li><a href="{{url('dossier/GPU')}}">GPU</a></li>
                    <li><a href="{{url('dossier/PPR')}}">PPR</a></li>
                    <li><a href="{{url('dossier/GPR')}}">GPR</a></li>
                    <li><a href="{{url('dossier/ADHOC')}}">ADHOC</a></li>
                    <li><a href="{{url('dossier/derogation')}}">Dérogation</a></li>

                  </ul>
                  @can('adminOragent_gu')

                  <a href="{{url('dossier/supp')}}"><i class="glyphicon glyphicon-trash" style="font-size: 30px; float: right;margin-right: 5.5%;margin-top: -5%;"></i><span style="float: right;margin-right: 4%;margin-top: -2%;">Corbeille</span></a>
@endcan
        </nav><br><br>
   <h3></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">

        <div class="row pull-right" style="margin-right: 4%;">
            <a href="{{ route('view-pdf') }}" type="button" class="btn btn-info">Telecharger PDF</a>
            <a href="{{ url('downloadExcelSearch/xlsx') }}"><button class="btn btn-info">Exporter</button></a>

        </div>
        <form action="/cases" method="GET">
            De:<input type="date" name="from" required>
            A:<span><input type="date" name="to" required>
            <button type="submit" class="btn btn-info btn-sm">Chercher</button></span>
            </a></form>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th style="text-align:center" width="5%">Numéro du projet</th>
        <th  style="text-align:center" width="5%">Type</th>
        <th  style="text-align:center" width="5%">Pétitionnaire</th>
        <th  style="text-align:center" width="5%">Archetecte</th>
        <th  style="text-align:center" width="5%">Situation</th>
        <th  style="text-align:center" width="5%">Nature</th>

        <th  style="text-align:center" width="5%">Historique</th>
        @can('adminOragent_gu')
        <th  style="text-align:center" width="5%">Résultat des commissions</th>
          @endcan
        <th  style="text-align:center" width="5%">Action</th>

        <th  style="text-align:center" width="5%">Fiche technique</th>
        @can('adminOragent_gu')
        <th  style="text-align:center" width="4%"><a href="{{ url('dossier/create') }}">
        <span class="table-add glyphicon glyphicon-plus"
        style="font-size: 18px;color:#3c8dbc;"></span></a></th>
          @endcan
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

 <td>
          {{$projet->petitionnaire}}
         </td>
         <td>
          {{$projet->architecte}}
         </td>
         <td>
          {{$projet->situation}}
         </td>
         <td>
          {{$projet->consistance}}
         </td>
         <td>@can('adminOragent_gu')

           <a href="{{url('historique/'.$projet->id.'/capt')}}">
          <button type="submit" class="table-add glyphicon glyphicon-plus"  style="color:blue;"></button></a>&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;
          @endcan
          <a href="{{url('historique/'.$projet->id.'/view')}}">
            <button type="submit" class=" glyphicon glyphicon-eye-open"  style="color:blue;"></button></a>
        </td>

          @can('adminOragent_gu')

        <td>
            @if($projet->type=='')
            <a href="{{url('commission/'.$projet->id.'/commission')}}">
            <button type="submit" class="table-add glyphicon glyphicon-plus"  style="color:blue;"></button></a>
          @else
              {{$projet->type}}
          @endif



        </td> @endcan

        <td>

     <a href="{{url('dossier/'.$projet->id.'/details')}} "> <button type="submit" class="glyphicon glyphicon-info-sign"  style="color:blue;"></button>
              </a>     &nbsp
              @can('adminOragent_gu')
              <a href=" {{url('dossier/'.$projet->id.'/edit')}} "> <button type="submit" class="glyphicon glyphicon-pencil"  style="color:blue;"></button>
              </a>&nbsp
          <form action=" {{url('dossier/'.$projet->id)}} " method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="glyphicon glyphicon-trash  " style="color:blue;"></button>
           </form>
          @endcan
  </td>
         <td><a target="_blank" href="{{url('dossier/'.$projet->id.'/pdf')}}">
          <button type="submit" class="glyphicon glyphicon-print"  style="color:blue;"></button></a>
        </td>

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

