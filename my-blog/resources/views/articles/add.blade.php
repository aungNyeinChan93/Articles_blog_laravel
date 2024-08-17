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
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" value="{{old("title")}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Body</label>
                    <textarea name="body" class="form-control">{{old("body")}}</textarea>
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
                <input type="submit" value="Add Article" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection


<!-- @section("content")
<div class="container add">
    <div class="row">
        <div class="col-8 offset-2">
            <h5>Add Article</h5>
            <form action="" method="post">
                <input type="text" name="title" id="" class="form-control" placeholder="enter title">
                <textarea name="" name="body" class="form-control my-1"></textarea>
                <input type="submit" name="add" class="btn btn-info my-1 w-25" value="ADD">
            </form>
        </div>
    </div>
</div>
@endsection -->
