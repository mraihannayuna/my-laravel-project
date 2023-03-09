<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warung Makan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <h1 class="align-middle m-5">Daftar Makanan</h1>

    <table class="container table table-bordered m-5">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Nama</th>
    <th scope="col">Harga</th>
    </tr>
</thead>
<tbody>
    <tr>
        @php( $number = 1 )
        @foreach($menu as $p)
        <tr>
        <th scope="row">{{$number}}</th>
        <td>{{ $p[0] }}</td>
        <td>Rp.{{ $p[1] }}</td>
    </tr>
    @php( $number++ )
        @endforeach
    </tr>
</tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
