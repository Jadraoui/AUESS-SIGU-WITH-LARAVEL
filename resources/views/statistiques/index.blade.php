@extends('layouts.espace')
@section('link')

    {!! Charts::assets() !!}
    @endsection
@section('content')
    <!-- Logo -->
   
  <!-- Content Wrapper. Contains page content -->
   <section class="content">


     <div class="row" style="margin-top: -5%;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
             <span class="info-box-icon bg-aqua"><i class="ion ion-person" style="margin-top: 11%;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> utilisateurs</span>
              <span class="info-box-number">{{$users}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red" style=""><i class="glyphicon glyphicon-folder-open" style=""></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> dossiers</span>
              <span class="info-box-number">{{$dossiers}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-ok-sign"style="margin-top: 11%;" ></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> commissions</span>
              <span class="info-box-number"> {{$commissions}} </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Factures</span>
              <span class="info-box-number"> {{$factures}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
  

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
           <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tous">Tous</a></li>
    <li><a href="#PPU">PPU</a></li>
    <li><a href="#PPR">PPR</a></li>
    <li><a href="#GPU">GPU</a></li>
     <li><a href="#GPR">GPR</a></li>
     <li><a href="#ADHOC">AD-HOC</a></li>
     <li><a href="#DEROGATION">Dérogation</a></li>
            </ul>
           <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div id="tous" class="chart tab-pane active" style="height: auto;padding-bottom: 4%; ">
        <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="annee">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer" style="color: black;position: absolute;">
  
</form>{!! $nbr_doss->render() !!}
    </div>
               <div id="PPU" class="chart tab-pane"  style="height: auto;padding-bottom: 4%;">
     <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="anneePPU">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>{!! $nbrPPU->render() !!}
    </div>
    <div id="PPR" class="tab-pane fade" style="height: auto;padding-bottom: 4%;">
      <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
  
   <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>       
  <select style="color: black;width: 15%; height: 4.5%;" name="anneePPR">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>{!! $nbrPPR->render() !!}
    </div>
    <div id="GPU" class="tab-pane fade" style="height: auto;padding-bottom: 4%;">
         <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         
   <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="anneeGPU">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>
{!! $nbrGPU->render() !!}
    </div>
     <div id="GPR" class="tab-pane fade" style="height: auto;padding-bottom: 4%;">
 <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         
   <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
          
  <select style="color: black;width: 15%; height: 4.5%;" name="anneeGPR">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>
{!! $nbrGPR->render() !!}

     </div>
 <div id="ADHOC" class="tab-pane fade" style="height: auto;padding-bottom: 4%;">

  <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         
   <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="anneeADHOC">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>
{!! $nbrADHOC->render() !!}

 </div>

 <div id="DEROGATION" class="tab-pane fade" style="height: auto;padding-bottom: 4%;">

  <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         
   <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="anneeDEROGATION">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer"s style="color: black;position: absolute;">
  
</form>
{!! $nbrDEROGATION->render() !!}

 </div>
            </div>
     
</div>

 <section class="col-lg-5 connectedSortable" style="margin-left: 100%; width: 77%;margin-top: -88%;">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
          
             <div class="box-body">
              
{!! $nbr2_doss->render() !!} </div>
          
                <!-- ./col -->
              </div>
              <!-- /.ro
<section class="col-lg-5 connectedSortable" style="margin-left: 100%; width: 77%;margin-top: -91%;">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
          
             <div class="box-body">
{!! $nbr_proj->render() !!}
             </div>
          
             </div></section></section></div></section>

 <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable" style="margin-top: -32%;margin-left: 1.5%;width: 57%;">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
          <ul class="nav nav-tabs" >
              <li class="active"><a href="#mois">Par mois </a></li>
    <li><a href="#annee">Par années</a></li>
 
            </ul>
           <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div id="mois" class="chart tab-pane active" style="height: auto; ">
        <form action="{{url('statistiques')}}" method="GET" class="contact100-form validate-form" >
  @Csrf
         <br>
  <span class="label-input100" style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sélectionner l'année</span>
  
          
  <select style="color: black;width: 15%; height: 4.5%;" name="annee_SRV">
    <option  placeholder="sss"></option><option>2014</option>
    <option>2015</option><option>2016</option>
    <option>2017</option><option>2018</option>
    <option>2019</option><option>2020</option>
    <option>2021</option><option>2022</option> 
    <option>2023</option><option>2024</option>
    <option>2025</option><option>2026</option>
    <option>2027</option><option>2028</option>
    <option>2029</option><option>2030</option>
    
  </select>&nbsp;
  <input type="submit" name="submit" value="Entrer" style="color: black;position: absolute;">
  
</form>{!! $services_mois->render() !!}
    </div>
 <div id="annee" class="tab-pane fade" style="height: auto;padding-bottom: 4%; ">
  {!! $services_annees->render() !!}
 </div>
 </div></section></div></div>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  @endsection

