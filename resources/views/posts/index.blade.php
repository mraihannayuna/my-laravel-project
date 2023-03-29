

@extends('layouts.app')
@section('title', "OhayoBlog")
@section('content')


        <h1>
            Blog Saya
            <a class="btn btn-success" href="{{ url('posts/create') }}">+ Buat Postingan</a>
            <a class="btn btn-danger" href="{{ url('posts/trash') }}">Riwayat delet</a>
            <a class="btn btn-primary" href="{{ url('posts/create') }}">Tambahkan Comment</a>
        </h1>
        @if(session()->has('login_message'))
        <div class="position-relative">
            <div class="alert alert-success alert-dismissible fade show js-alert position-absolute top-10 end-0 translate-middle" style="z-index: 6;" role="alert">
                {{ session()->get('login_message') }}
            </div>
            </div>
@endif
    <p class="text-muted">Total Postingan aktif : <span class="text-success">{{ $total_active }}</span> / Total Postingan non aktif : <span class="text-warning">{{ $total_nonactive }}</span> / Total Postingan Dihapus : <span class="text-danger">{{ $total_deleted }}</span></p>

    @foreach($posts as $p)

    <div class="card mb-3">
    <div class="card-body">
        <p class="card-text">{{ $p->title }}</p>
        <p class="card-text">{{ $p->content }}</p>
        <p class="card-text"><small class="text-muted">Created at {{ date("d M Y H:i"), strtotime($p->created_at)}}</small></p>
        <a href="{{ url("posts/$p->slug") }}" class="btn btn-primary">Selengkapnya</a>
        <a href="{{ url("posts/$p->slug/edit") }}" class="btn btn-warning">edit</a>
    </div>
    </div>
    @endforeach
@endsection


