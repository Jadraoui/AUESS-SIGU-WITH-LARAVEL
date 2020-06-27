<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <header><img src="../img/pic1.jpg" /></header>
    <div class="jumbotron text-center">
    <h3>N° Dossier :{{$pro->num}}</h3>
    </div>
    <div class="container">
        <table class="table">
                <tr>
                        <th style="width:29%;">Nom et Prénom </th><br>
                        <th> {{$pro->petitionnaire}} </th><br>
                      </tr>
                      <tr>
                            <th style="width:29%;">CIN</th><br>
                            <th style="width: 70%;">{{$pro->cin}}</th><br>
                          </tr>
                          <tr>
                         <th style="width:29%;">Adresse</th><br>
                                <th>{{$pro->adresse}}</th><br>
                              </tr>
                              <tr>
                          <th style="width:29%;">Situation/Commune</th><br>
                                    <th>{{$pro->situation}},{{$pro->commune}}</th><br>
                                  </tr>
                                  <tr>
                         <th>Nature de projet</th><br>
                                        <th>{{$pro->consistance}}</th>

                                      </tr>
                                      <tr>
                         <th>Surface Couverte</th><br>
                                            <th>{{$pro->SurfaceCouverte}}</th><br>
                                          </tr>
                                          <tr>
                      <th>Surface Aménagée</th><br>
                                                <th>{{$pro->SurfaceAmenage}}</th><br>
                                              </tr>
                                              <tr>
                                              <th>Superficie Parcelle</th><br>
                                              <th>{{$pro->SurfaceParcelle}}</th><br>
                                            </tr>
                                        <tr>
                                        <th>Superficie à Taxer</th><br>
                                        <th style='text-decoration: underline;'>{{$pro->SurfaceTaxe}}</th><br>
                                      </tr>
          </table>
    </div>
</body>

</html>
