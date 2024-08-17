@extends("layouts.app")

@section("content")
<div class="container">

<!-- for flash message -->
 @if (session("info"))
    <div class="alert alert-info">
        {{session("info")}}
    </div>
 @endif
<!-- for update flash message -->
 @if (session("update"))
    <div class="alert alert-success">
        {{session("update")}}
    </div>
 @endif

<!--for pegimation bar  -->
{{ $articles->links() }}


    @foreach($articles as $article)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="card-link btn btn-sm btn-info " href="{{ url("/articles/detail/$article->id") }}">
                    View Detail &raquo;
                </a>
                <a class="card-link btn btn-sm btn-warning " href="{{ url("/articles/edit/$article->id") }}">
                    Edit &raquo;
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
