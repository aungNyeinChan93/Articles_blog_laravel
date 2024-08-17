@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row w-100">
        <div class="col-9 offset-1 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ol>
                        @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            <form action="/articles/update/{{$article->id}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$article->title}}">
                </div>
                <div class="mb-3">
                    <label>Body</label>
                    <textarea name="body" class="form-control">{{$article->body}}</textarea>
                </div>
                  <div class="mb-3">
                    <label>Category</label>
                    <select class="form-select" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Edit" class="btn btn-danger">
                <a href="/" class="btn btn-info">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection



