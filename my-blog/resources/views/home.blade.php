@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <!--for pegimation bar  -->
                {{ $articles->links() }}
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }}{{ __(' Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-success">
                            {{ 'user ' . Auth::user()->id }}{{ __(' logging is success!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($articles as $article)
                    <div class="card mb-2 mt-2">
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
                            <a class="btn btn-sm btn-danger ms-3" href="{{ url("/articles/delete/$article->id") }}">
                                Delete
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
