@foreach($projets as $projet)
     
<?php  
$id=$projet->id;
$province=$projet->province;
$commune=$projet->commune;
$consistance=$projet->consistance;
$situation=$projet->situation;
$petitionnaire=$projet->id;
$architecte=$projet->architecte;
$requisition=$projet->requisition;
$tf=$projet->tf; 
$adresse=$projet->adresse; 
$num_titre_foncier=$projet->num_titre_foncier; 
$hauteur=$projet->hauteur; 
$c_e_s=$projet->c_e_s; 
$c_o_s=$projet->c_o_s; 

?>


@endforeach
@extends('layouts.espace')
@section('link')
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   @endsection
    
     @section('content')            
          <div class="container">
              @if(session()->has('success'))
              <br><br>
             <div class="alert alert-success"> 
              {{ session()->get('success')}}
             </div>
             @endif  
       @if($nbr!=0)    
  <div class="container" style="margin-top: -3%;margin-left: -5%;">
  <ul class="nav nav-tabs" style="margin-left: 10%;margin-right: 10%;">
    <li class="active"><a href="#home">Détails du projet</a></li>
    <li><a href="#menu1">Historique du projet</a></li>
    <li><a href="#menu2">Résultat de commission</a></li>
    <li style="float: right;"><a href="{{url('dossier')}}" style="float: right;margin-right: 80%;"><button type="button" class="btn btn-primary" ><i class="glyphicon glyphicon-circle-arrow-left" style="font-size: 20px;"></i></button></a> 
       </li>
  </ul><br>

@else
<div class="container" style="margin-top: -3%;margin-left: -5%;">
  <ul class="nav nav-tabs" style="margin-left: 10%;margin-right: 10%;">
    <li class="active"><a href="#home">Détails du projet</a></li>
   
    <li><a href="#menu2">Résultat de commission</a></li>
    <li style="float: right;"><a href="{{url('dossier')}}" style="float: right;margin-right: 80%;"><button type="button" class="btn btn-primary" ><i class="glyphicon glyphicon-circle-arrow-left" style="font-size: 20px;"></i></button></a> 
       </li>
  </ul><br> 
  @endif
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <p style="text-align:center;font-size:20px;color:black;">  المملكة المغربية  <br>
              وزارة التعمير وإعداد التراب الوطني
              <br>
              الوكالة الحضرية للصويرة
              <br>
              ***
             </p>

             <h3 style="font-family:Algerian; text-align:center;"> ملف تحليلي </h3>
             <h3 style="font-family:Algerian;text-align:center;"> Fiche D'analyse </h3><br>
     <table style="position:relative;margin-left: 16%;" >

<tr>
     <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;" >   Province</td>
     <td style="width:40%;"> {{$province}}   </td>
     <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> الاقليم  </td>
     </tr>
<tr>
<td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;" >   Commune </td>
<td style="width:40%;"> {{$commune}}   </td>
<td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> الجماعة  </td>
</tr>

<tr>
    <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;">   Consistance du projet </td>
    <td style="width:40%;"> {{$consistance}}   </td>
    <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar">  محتوى المشروع  </td>
    </tr>

    <tr>
        <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;">   Situation </td>
        <td style="width:40%;"> {{$situation}}   </td>
        <td style="width:41000%;float:right;font-weight: bold;text-decoration:underline;" dir="rtl" lang="ar"  xml:lang="ar">  الموقع  </td>
        </tr>

        <tr>
            <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;">   Pétitionnaire </td>
            <td style="width:40%;"> {{$petitionnaire}}   </td>
            <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> صاحب المشروع </td>
            </tr>

      <tr>
                <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;">   Architecte </td>
                <td style="width:40%;"> {{$architecte}}   </td>
                <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar">  المهندس  </td>
                </tr>

    <tr>
                    <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;">   Référence foncière : Réquisition </td>
                                        <td style="width:40%;"> {{$requisition}}   </td>
                    <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar">  المرجع العقاري: مطلب التحفيظ  </td>
                    </tr>

     <tr>
                        <td style="width:40%; padding:2%;font-weight: bold;text-decoration:underline;">   TF</td>
                                            <td style="width:40%;"> {{$tf}}   </td>
                        <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> رقم التحفيظ  </td>
                        </tr>
</table>
    </div>
    <div id="menu1" class="tab-pane fade">
       <p style="text-align:center;font-size:20px;color:black;">  المملكة المغربية  <br>
              وزارة التعمير وإعداد التراب الوطني
              <br>
              الوكالة الحضرية للصويرة
              <br>
              ***
             </p>

             <h3 style="font-family:Algerian; text-align:center;"> ملف تحليلي </h3>
             <h3 style="font-family:Algerian;text-align:center;"> Fiche D'analyse </h3><br>
   <table border="1" cellpadding="2" cellspacing="0" style="width:90%;margin-left: 5%;" >
        <tr><th colspan="2" style="text-align:center;height:50px;"> Arrivée </th>
            <th colspan="2" style="text-align:center;height:50px;"> Examen par la commission </th>
            <th colspan="2" style="text-align:center;height:50px;"> Envoi à la commune </th> </tr>
    <tr>
       <td style="text-align: center;width:15%;">
        Date d'arrivée
       </td>
       <td style="text-align: center;width:15%;">
        N° d'arrivée
       </td>
       <td style="text-align: center;width:15%;">
        Date d'examen par la commission
       </td>
       <td style="text-align: center;width:15%;">
        N° d'examen par la commission
       </td>
       <td style="text-align: center;width:15%;">
        Date d'envoi à la commune
       </td>
       <td style="text-align: center;width:15%;">
        N° d'envoi à la commune
       </td>
      </tr>
      @foreach ($projets as $projet)
      <tr>
       <td style="text-align:center;padding:2%;">
       {{$projet->date_arr}}
       </td>
       <td style="text-align:center;">
            {{$projet->num_arr}}
       </td>
       <td style="text-align:center;">
            {{$projet->date_exam}}
       </td>
       <td style="text-align:center;">
            {{$projet->num_exam}}
       </td>
       <td style="text-align:center;">
            {{$projet->date_env}}
       </td>
       </td>
       <td style="text-align:center;">
            {{$projet->num_env}}
       </td>
      </tr>   @endforeach
    </table> 
    </div>
    <div id="menu2" class="tab-pane fade">
       <p style="text-align:center;font-size:20px;color:black;">  المملكة المغربية  <br>
              وزارة التعمير وإعداد التراب الوطني
              <br>
              الوكالة الحضرية للصويرة
              <br>
              ***
             </p>

             <h3 style="font-family:Algerian; text-align:center;"> ملف تحليلي </h3>
             <h3 style="font-family:Algerian;text-align:center;"> Fiche D'analyse </h3><br>

      <table style="position:relative;margin-left: 15%;">
     
    
           
     
         <tr>
                         <td style="width:40%;padding:2%; font-weight: bold;text-decoration:underline;"> Avis de la commission </td>
                                             <td style="width:50.5%;">  {{$projet->type}} </td>
                         <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar">  رأي اللجنة   </td>
                         </tr>

                         <tr>
                              <td style="width:40%;padding:2%;font-weight: bold;text-decoration:underline;"> Réunie le  </td>
                              <td style="width:45.7%;">{{$projet->created_at}}  </td>
                              <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> المنعقدة بتاريخ</td>
                              </tr>
     
          <tr>
                             <td style="width:40%; padding:2%;font-weight: bold;text-decoration:underline;">Observation</td>
                             <td style="width:45.7%"></td>
                             <td style="width:100%;float:right;font-weight: bold;text-decoration:underline; margin-top:10%;" dir="rtl" lang="ar"  xml:lang="ar"> ملاحظات  </td>
                            
                         </tr>
                         
               
                              </table><br>
                              <p style="width:50%;height:auto;border:1px black solid; margin-left:24%; ">
                         &nbsp {{$projet->obs}}  
                         </p>
    </div>
  
  </div>
</div>

<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>
@endsection
