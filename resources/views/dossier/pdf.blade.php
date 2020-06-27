<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="{{ asset('css/style3.css') }}" type="text/css" rel="stylesheet" id="main-style">

  <link href="{{ asset('css/style2.css') }}" type="text/css" rel="stylesheet" id="main-style">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>

<body>
    <header><img src="../img/pic1.jpg" /></header>
    <div class="text-center">
           <h3> Fiche technique </h3>
  <div id="table" class="table-editable">
    <table class="table">
      <tr>
        <th style="width:29%;">Intitulet du projet</th><br>
        <th> {{$pro->consistance}} </th><br>
      </tr>
      <tr>
            <th style="width:29%;">Situation</th><br>
            <th style="width: 70%;">{{$pro->situation}}</th><br>
          </tr>
          <tr>
         <th style="width:29%;">Maitre d'ouvrage</th><br>
                <th>{{$pro->petitionnaire}}</th><br>
              </tr>
              <tr>
          <th style="width:29%;">Maitre d'aeuvre</th><br>
                    <th>{{$pro->architecte}}</th><br>
                  </tr>
                  <tr>
         <th>Référence foncière</th><br>
                        <th>{{$pro->requisition}}<br>{{$pro->tf}}</th>

                      </tr>
                      <tr>
         <th>Superficie du terrain</th><br>
                            <th>{{$pro->superficie}}</th><br>
                          </tr>
                          <tr>
      <th>Situation urbanistique</th><br>
                                <th></th><br>
                              </tr>
                              <tr>
    <th>Programme</th><br>
                                    <th>Hauteur : {{$pro->hauteur}}<br>
                                        C.E.S : {{$pro->c_e_s}}<br>
                                        C.O.S : {{$pro->c_o_s}}<br>
                                  </th>

                                  <tr>
     <th>Observations<br>Remarques</th>

                                        <th>{{$pro->observation}}</th><br>
                                      </tr>
      <tr>


      </tr>
    </table></div>


  </body>

</html>
