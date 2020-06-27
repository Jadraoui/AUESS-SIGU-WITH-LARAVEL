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
       @if(session()->has('edit'))
    <div class="alert alert-success">
    {{ session()->get('edit')}}
    </div>
  @endif
    @if(session()->has('successhistorique'))
      <div class="alert alert-success">
      {{ session()->get('successhistorique')}}
      </div>

      @if(session()->has('successcommission'))
      <div class="alert alert-success">
      {{ session()->get('successcommission')}}
      </div>
    @endif
  @endif
  @if(session()->has('ErreurRech'))
  <div class="alert alert-danger">
   {{ session()->get('ErreurRech')}}
  </div>
  @endif
  @if (Session::has('successImport'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('successImport') }}</p>
                    </div>
                @endif
  <div class="container box" style="width:1100px; margin-left:-2%;">
    <nav style="position:absolute;margin-top:1%;width:100%;">


                <ul class="ul">
                    <li ><a href="{{url('dossier')}}">Tous</a></li>
                    <li ><a href="{{url('dossier/PPU')}}">PPU</a></li>
                    <li><a href="{{url('dossier/GPU')}}">GPU</a></li>
                    <li><a href="{{url('dossier/PPR')}}">PPR</a></li>
                    <li style="background-color:#5bc0de;text-aligne:center;"><a href="{{url('dossier/GPR')}}">GPR</a></li>
                    <li ><a href="{{url('dossier/ADHOC')}}">ADHOC</a></li>
                    <li><a href="{{url('dossier/derogation')}}">Dérogation</a></li>
                  </ul>
        </nav><br><br>
   <h3></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
     <div class="container">

        <div class="row pull-right" style="margin-right: 10%;">
            <a href="{{ route('view-pdf-gpr') }}" type="button" class="btn btn-info">Telecharger PDF</a>
            <a href="{{ url('downloadExcelSearchGPR/xlsx') }}"><button class="btn btn-info">Exporter</button></a>
        </div>
        <form action="/casesGPR" method="GET">
            De:<input type="date" name="from" required>
            A:<span><input type="date" name="to" required>
            <button type="submit" class="btn btn-info btn-sm">Chercher</button></span>
            </a>
        </form>
        <div style="float:right">
            <form action="{{ url('importExcelGPR') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="file" name="import_file" />
                <button class="btn btn-info btn-sm">Import File</button>
            </form>
            </div>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
               <th style="text-align:center" width="5%">N°</th>

              <th  style="text-align:center" width="5%">Historique</th>
              @can('adminOragent_gu')
              <th  style="text-align:center" width="5%">Résultat des commissions</th>
                @endcan
              <th  style="text-align:center" width="2%">Action</th>

              <th  style="text-align:center" width="5%">Fiche technique</th>
              <th width="5%">Fiche de taxe</th>
              <th width="5%">Note de calcul</th>
              <th width="5%">Autorisation de versement</th>
              <th width="5%">Payement</th>
              <th width="5%">Facture</th>
              @can('adminOragent_gu')
              <th  style="text-align:center" width="4%"><a href="{{ url('dossier/createGPR') }}">
              <span class="table-add glyphicon glyphicon-plus"
              style="font-size: 18px;color:#3c8dbc;"></span></a></th>
                @endcan
              </tr>
             </thead>
       <tbody>

   @foreach($projets as $projet)
   <tr style="text-align:center;">
    <td>{{ $projet->num }}</td>


         <td>@can('adminOragent_gu')
         <a href="{{url('historique/'.$projet->id.'/captGPR')}}">
          <button type="submit" class="table-add glyphicon glyphicon-plus" style="color:blue;"></button></a>&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;
        @endcan
          <a href="{{url('historique/'.$projet->id.'/view')}}">
            <button type="submit" class=" glyphicon glyphicon-eye-open" style="color:blue;"></button></a>
        </td>
        @can('adminOragent_gu')
        <td>
                    @if($projet->type=='')

          <a href="{{url('commission/'.$projet->id.'/createGPR')}}">
         <button type="submit" class="table-add glyphicon glyphicon-plus" style="color:blue;"></button></a>&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;
         @else
         {{$projet->type}}
         @endif

    </td>
         @endcan
      <td>  <a href=" {{url('dossier/'.$projet->id.'/details')}} "> <button type="submit" class="glyphicon glyphicon-info-sign" style="color:blue;"></button>
              </a>
      @can('adminOragent_gu')
              <a href=" {{url('dossier/'.$projet->id.'/editGPR')}} "> <button type="submit" class="glyphicon glyphicon-pencil" style="color:blue;"></button>
              </a> &nbsp;
       <form action=" {{url('dossier/'.$projet->id)}} " method="POST">

              {{ csrf_field() }}
              {{ method_field('DELETE') }}
             &nbsp;

              <button type="submit" class="glyphicon glyphicon-trash  " style="color:blue;"></button>

         </form>  @endcan</td>

         <td><a target="_blank" href="{{url('dossier/'.$projet->id.'/pdf')}}">
          <button type="submit" class="glyphicon glyphicon-print" style="color:blue;"></button></a>
        </td>
        {{---------------------------SERVICES RENDUS------------------------}}
        @if($projet->commission=='1')
        <td>
                @if($projet->SurfaceTaxe =='' && $projet->gen =='0')
                @can('adminOrarchi')
                <a href="{{url('ficheDeTaxe/'.$projet->id.'/captPPU')}}">Génerer</a><br>
                @endcan
                @elseif($projet->ex=='1')
                <p style="color:red">examiné</p>
                @elseif($projet->ex=='0' && $projet->gen =='1')
                <p style="color:red">Encore d'examination</p>
                @else
                <p></p>
                @endif
                {{--class="table-add glyphicon glyphicon-refresh"--}}
                @if($projet->ex =='0' && $projet->gen =='1')
                @can('adminOrval_gu')
                <a href="{{url('ficheDeTaxe/'.$projet->id.'/captPPU2')}}">Examiner</a><br>
                @endcan
                @elseif($projet->val=='1')
                <p style="color:red">validé</p>
                @elseif($projet->val=='0' && $projet->gen =='1' && $projet->ex =='1')
                <p style="color:red">Encore de validation</p>
                @else
                <p></p>
                @endif
                {{--class="table-add glyphicon glyphicon-ok-sign"--}}
                @if($projet->val =='0' && $projet->ex=='1')
                @can('adminOrval_gu')
                <a href="{{url('ficheDeTaxe/'.$projet->id.'/captPPU3')}}">Valider</a><br>
                @endcan
                @elseif($projet->val =='1')
                <a target="_blank" href="{{url('projetPPR/'.$projet->id.'/pdf2')}}">Imprimer</a>

                @endif
                </td>
                @else
                <td></td>
                @endif
                @if($projet->val =='1')
                <td><a target="_blank" href="{{url('projetPPR/'.$projet->id.'/pdf3')}}">
                    <button type="submit" class="glyphicon glyphicon-eye-open" style="color:blue;"></button></a>
                </td>
                @else
                <td></td>
                @endif

                <td>
                  @if(3*($projet->SurfaceTaxe)+(0.2*($projet->SurfaceTaxe))>5000 && $projet->val_auto=='0' &&($projet->val=='1'))
                  @can('adminOrdirecteur')
                  <a target="_blank" href="{{url('Versement/'.$projet->id.'/captPPU')}}">
                    <button type="submit" class="glyphicon glyphicon-ok" style="color:blue;"></button>
                  </a>
                  @endcan
                  @can('adminOrregi')
                  <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:black;"></i>
                  @endcan
                  @elseif(3*($projet->SurfaceTaxe)+(0.2*($projet->SurfaceTaxe))>5000 && $projet->val_auto=='1' &&($projet->val=='1'))
                  @can('adminOrregiOrdir')
                  <a target="_blank" href="{{url('Versement/'.$projet->id.'/captPPU_pdf')}}">
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:blue;"></i>
                  </a>
                  @endcan
                  @else

                </td>
                @endif
                @if($projet->val_auto=='1' || $projet->val_auto=='0' &&( ($projet->commission=='1')&&($projet->val=='1') ))
                <td>
                    @if($projet->pay=='0')
                    @can('adminOrregi')
                    <form action="{{url('Payement/'.$projet->id)}}" method="post" >
                        <input type="hidden" name="_method" value="PUT">
                        @Csrf
                                <button  class="glyphicon glyphicon-ok" style="color:blue;">
                                </button>
                    </form>
                    @endcan
                    @else
                    <i type="submit" class="glyphicon glyphicon-ok" style="color:green;"></i>
                    @endif
                </td>
                @else
                <td>
                </td>
                @endif
                @if($projet->pay=='1')
                <td>
                    <a target="_blank" href="{{url('Facture/'.$projet->id.'/captPPU_pdf')}}">
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:blue;"></i>
                    </a>
                </td>
                @else
                <td>
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:black;"></i>
                </td>
                @endif

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

