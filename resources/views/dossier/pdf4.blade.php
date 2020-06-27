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
    <div class="text-center">
            <h3>AUTORISATION DE VERSEMENT N° :{{$pro->num}}</h3>
    </div>
    <div class="container">
                <br><br>
                <h4>N° N.C :......./{{$pro->created_at->year}}</h4>
                <p>Je soussigné Directeur de l'Agence Urbaine d'Essaouira,autorise :</p>
                <h4>Nom et prénom : {{$pro->petitionnaire}}</h4>
                <h4>N° CIN : {{$pro->cin}}</h4>
                <h4>Adresse : {{$pro->adresse}}</h4>

                <p>A verser la somme de (En chiffres) : {{$pro->SurfaceTaxe}} Dhs TTC</p>
                <p>(En Lettres) : ......... Dirhames Toutes Taxes Comporises</p>
                <br>
                <p>Au compte de la trésorerie Provinciale de l'Agence Urbaine d'Essaouira.</p>
                <br>
                <br>
                Compte RIB n° &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                3.1.0.2.4.0.1.0.3.1.0.2.4.0.0.4.3.9.4.1.0.1.2.0
                <br><br>
                <p>Fait à Essaouira, le</p>
    </div>
</body>

</html>
