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
    <div class="jumbotron text-center">
        <h4>ETAT DES SERVICES RENDUS</h4>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                            <th>N° de facture</th>
                            <th>N° Dossier</th>
                            <th>Montant TTC</th>
                            <th>Bénéficiaire</th>
                            <th>Nature de projet</th>
                            <th>Supérficie à Taxer(M²)</th>
                            <th>Observation</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pro as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->num }}</td>
                        <td>{{ 3*$p->SurfaceTaxe+0.2*$p->SurfaceTaxe }}</td>
                        <td>{{ $p->petitionnaire }}</td>
                        <td>{{ $p->consistance }}</td>
                        <td>{{ $p->SurfaceTaxe }}</td>
                        <td>{{ $p->Fact_pay }}</td>
                    </tr>
                    @empty
                        <p>No users</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
