@extends('layouts.app')
@section('title', "OhayoBlog | Trash")
@section('content')
<div class="container mt-5">
    <h1>
        Blog Saya
                <a class="btn btn-primary" href="{{ url('posts') }}">Kembali</a>
    </h1>

@foreach($posts as $p)

<div class="card mb-3">
  <div class="card-body">
    <p class="card-text">{{ $p->title }}</p>
    <p class="card-text">{{ $p->content }}</p>
    <p class="card-text"><small class="text-muted">Created at {{ date("d M Y H:i"), strtotime($p->created_at)}}</small></p>
  </div>
</div>
@endforeach
</div>

{{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
@endsection
