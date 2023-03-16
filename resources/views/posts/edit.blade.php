<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Ubah Postingan</title>

            {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form method="post" action="{{ url("posts/$posts->id") }}">
        @method('PATCH')
        @csrf
    <div class="container mt-5">
    <h1 class="my-4">Ubah Postingan mu</h1>
    <div class="mb-3">
  <label for="title" class="form-label">Judul</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $posts->title }}" required>
</div>
<div class="mb-3">
    <label for="title" class="form-label">Konten</label>
  <textarea class="form-control" id="content" rows="3" name="content" required>{{ $posts->content }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
</div>

</form>

<div class="container mt-2">
<form method="post" action="{{ url("posts/$posts->id") }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
</div>

    {{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
