@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                    Category: <b>{{ $article->category->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="btn btn-sm btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                    Delete
                </a>
                <a class="btn btn-sm btn-info" href="{{ url('/') }}">
                    Back
                </a>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item bg-info">
                <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="btn btn-sm btn-close ms-4 float-end">
                    </a>
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>
        <form class="mt-2" action="{{ url('/comments/add') }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-sm btn-warning">
        </form>
    </div>
@endsection



