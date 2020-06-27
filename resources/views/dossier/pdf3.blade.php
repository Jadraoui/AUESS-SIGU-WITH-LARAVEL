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
    <h3>Note de calcul n° :{{$pro->num}}</h3>
    </div>
    <div class="container">
        <table class="table">
            <tr>
              <th style="width:29%;">Dossier n°</th><br>
              <th style="text-align:center"> {{$pro->num}} </th><br>
            </tr>

                <tr>
               <th style="width:29%;">Pétitionnaire</th><br>
                      <th style="text-align:center">{{$pro->petitionnaire}}</th><br>
                    </tr>
                    <tr>
                <th style="width:29%;">Nature de projet</th><br>
                          <th style="text-align:center">{{$pro->consistance}}</th><br>
                        </tr>
                 <tr>
                    <th style="width:29%;">Situation</th><br>
                            <th style="width: 70%;text-align:center" >{{$pro->situation}}</th><br>
                          </tr>
                <tr>
                            <th style="width:29%;">Superficie à Taxer en M²</th><br>
                            <th style="width: 70%;text-align:center">{{$pro->SurfaceTaxe}}</th><br>
                </tr>
                <?php $montant = $pro->SurfaceTaxe ?>
                <tr>
                    <th style="width:29%;">Montant Total en Dh/TTC</th><br>
                    <th style="width: 70%;text-align:center">{{3*$montant}}</th><br>
                </tr>
                    <tr style="text-align:center;padding:4%">
                            <th style="width:29%;">Etabli par :</th><br>
                            <th style="width: 70%;text-align:center">Le :</th><br>
                        </tr>
                        <tr style="text-align:center;">
                                <th style="width:29%;">Vérifié  par :</th><br>
                                <th style="width: 70%;text-align:center">Le :</th><br>
                        </tr>
                        <tr style="text-align:center;">
                                <th style="width:29%;">Visa de Régisseur  :</th><br>
                                <th style="width: 70%;text-align:center">Le :</th><br>
                        </tr>


            </tr>
          </table>
    </div>
</body>

</html>
