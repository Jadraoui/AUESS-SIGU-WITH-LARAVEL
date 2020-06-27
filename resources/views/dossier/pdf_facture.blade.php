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
    <h3>FACTURE n° :{{$pro->num}}</h3>
    </div>
    <div class="container">
        <h4>Etablit le : {{$pro->Fact_pay}}</h4>
        <h4>Client : {{$pro->petitionnaire}}</h4>
        <h4>Adresse : {{$pro->adresse}}</h4>
    </div><br><br><br><br>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Unité</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire HT</th>
                        <th>Montant Total en DH HT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span>{{ $pro->consistance }}</span><br>
                            <span>{{ $pro->situation }}</span><br><br><br><br>
                        </td>
                        <td>m²<br><br><br><br>
                        </td></td>
                        <td>{{ $pro->SurfaceTaxe }}<br><br><br><br>
                        </td></td>
                        <td>3.00</td>
                        <td>{{ 3*($pro->SurfaceTaxe) }}<br><br><br><br>
                        </td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table style="float:right;">
                <tr>
                        <th>Montant HT :</th><br>
                        <th> {{3*($pro->SurfaceTaxe)}} </th>
                </tr>
                <tr>
                        <th>TVA 20%< :/th><br>
                        <th> {{0.2*(3*($pro->SurfaceTaxe))}} </th>
                </tr>
                <tr>
                        <th>Total TTC :</th><br>
                        <th> {{3*($pro->SurfaceTaxe)+0.2*(3*($pro->SurfaceTaxe))}} </th>
                </tr>
        </table><br><br>
        <h4 style="text-align:center">Signé le </h4>


    </div>
</body>

</html>
