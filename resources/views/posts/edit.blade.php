
@extends('layouts.app')
@section('title', "OhayoBlog | Edit")
@section('content')
    <form method="post" action="{{ url("posts/$posts->slug") }}">
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
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</button>
</div>

</form>

<div class="container mt-2">


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
            <i class="fa-brands mx-3 fa-blogger fa-shake" style="color: #000000; scale: 2;"></i>OhayoBlog Says:<br>
            Apakah Kamu Yakin Ingin Menghapus Blog Ini?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-danger">{{ $posts->title }}</h3><br>
        <p class="text-danger">{{ $posts->content }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Dismiss</button>
        <form method="post" action="{{ url("posts/$posts->id") }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
