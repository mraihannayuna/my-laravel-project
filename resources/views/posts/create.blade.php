@extends('layouts.app')
@section('title', "OhayoBlog | NewBlog")
@section('content')
    <form method="post" action="{{ url('posts') }}">
        @csrf
    <div class="container mt-5">
    <h1>Buat Post Baru</h1>
    <div class="mb-3">
  <label for="title" class="form-label">Judul</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" required>
</div>
<div class="mb-3">
  <label for="content" class="form-label">Konten</label>
  <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
</div>

</form>

    {{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
@endsection
