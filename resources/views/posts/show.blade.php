
@extends('layouts.app')
@section('title', "OhayoBlog")
@section('content')
    <div class="container">
        <article class="blog-post mt-5">
        <h2 class="blog-post-title mb-1">{{ $posts->title }}</h2>
        <p class="blog-post-meta">{{ date("d M Y H:i"), strtotime($posts->created_at)}}</p>

        <p>{{ $posts->content }}</p>

        <small class="text-muted">{{ $total_comments }} Komentar</small>

        @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p class="font-size:8pt">{{ $comment->comment }}</p>
            </div>
        </div>
        @endforeach

        </article>

        <a href="{{ url("posts") }}" class="btn btn-success">Kembali</a>

    </div>
@endsection

