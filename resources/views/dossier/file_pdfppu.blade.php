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
        <h3>Liste des dossiers</h3>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>province</th>
                        <th>consistance</th>
                        <th>situation</th>
                        <th>petitionnaire</th>
                        <th>architecte</th>
                        <th>requisition</th>
                        <th>observation</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pro as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->province }}</td>
                        <td>{{ $p->consistance }}</td>
                        <td>{{ $p->situation }}</td>
                        <td>{{ $p->petitionnaire }}</td>
                        <td>{{ $p->architecte }}</td>
                        <td>{{ $p->requisition }}</td>
                        <td>{{ $p->observation }}</td>
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
