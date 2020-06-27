
@extends('layouts.espace')
@section('link')
  <title>Les services redus</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  @endsection

  @section('content')
 <body>

   <h3 align="center">ETAT DES SERVICES RENDUS</h3>

  <div class="container box" style="width:1100px; margin-left:-2%;">
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">Le nombre des sevices rendus - <b><span id="total_records"></span></b></div>
      <div class="col-md-5">
          Rechercher entre deux date :
       <div class="input-group input-daterange" style="margin-left:60;">
            <div class="input-group-addon">De</div>
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">A</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm" style="margin-left:-10%;">Rechercher</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-info btn-sm">Actualiser</button>
       <br><br>
       <div class="col-md-2">
            <a href="{{ route('view-pdf-SR') }}" type="button" class="btn btn-info btn-sm">Telecharger PDF</a>
        </div>
    </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
            <th width="4%">N° de facture</th>
            <th width="5%">N° Dossier</th>
            <th width="5%">Montant TTC</th>
            <th width="5%">Bénéficiaire</th>
            <th width="5%">Nature de projet</th>
            <th width="5%">Supérficie à Taxer(M²)</th>
            <th width="5%">Observation</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>



<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'dd-mm-yyyy',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('ServiceRendu.all_service') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + data[count].id + '</td>';
     output += '<td>' + data[count].num + '</td>';
     output += '<td>' + ((3*data[count].SurfaceTaxe)+(0.2*(3*data[count].SurfaceTaxe))) + '</td>';
     output += '<td>' + data[count].petitionnaire + '</td>';
     output += '<td>' + data[count].consistance  + '</td>';
     output += '<td>' + data[count].SurfaceTaxe  + '</td>';
     output += '<td>' + 'réglée le <br>' +data[count].Fact_pay  + '</td></tr>';
    }
    $('tbody').html(output);
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Les deux dates sont obligatoires');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});
</script>
@endsection
