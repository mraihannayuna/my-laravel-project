<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .body {
            padding: 6px;
            border-bottom: 1px solid royalblue;
        }

        sup {
            color:rgb(67, 145, 9);
        }

    </style>

</head>
<body>
<div class="container mt-5">
    <h1>
        Blog Saya
        <a class="btn btn-success" href="{{ url('posts/create') }}">+ Buat Postingan</a>
    </h1>

@foreach($posts as $p)

<div class="card mb-3">
  <div class="card-body">
    <p class="card-text">{{ $p->title }}</p>
    <p class="card-text">{{ $p->content }}</p>
    <p class="card-text"><small class="text-muted">Created at {{ date("d M Y H:i"), strtotime($p->created_at)}}</small></p>
    <a href="{{ url("posts/$p->id") }}" class="btn btn-primary">Selengkapnya</a>
    <a href="{{ url("posts/$p->id/edit") }}" class="btn btn-warning">edit</a>
  </div>
</div>
@endforeach
</div>

{{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
