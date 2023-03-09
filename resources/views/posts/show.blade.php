<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: {{ $post[1] }}</title>

        {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- self css --}}
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

</head>
<body>

    <div class="container">
        <article class="blog-post mt-5">
        <h2 class="blog-post-title mb-1">{{ $post[1] }}</h2>
        <p class="blog-post-meta">{{ date("d M Y H:i"), strtotime($post[3])}}</p>

        <p>{{ $post[2] }}</p>
        </article>

        <a href="{{ url("posts") }}" class="btn btn-success">Kembali</a>

    </div>

    {{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>


