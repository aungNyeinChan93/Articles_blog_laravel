@extends("layouts.app")

@section("content")
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $article->created_at->diffForHumans() }}
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a class="btn btn-sm btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                Delete
            </a>
            <a class="btn btn-sm btn-info" href="{{ url("/") }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection


<!--
@section("content")
<div class="container  ">
    <h1>{{$article->id}}</h1>
    <div class="row ">
        <div class="col-8 offset-2">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">{{$article->body}}</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="/" class="card-link">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
