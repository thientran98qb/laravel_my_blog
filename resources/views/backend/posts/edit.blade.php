@extends('layouts.app')
@section('title', 'Create A New Post')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" action="">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
            <fieldset>
                <legend>Create a new post</legend>
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{$post->title}}" id="title" placeholder="Title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="content" name="content">{{$post->content}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categories" class="col-lg-2 control-label">Categories</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="category" name="categories[]" multiple>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ in_array($category->id,$categorySelected) ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="{{route('admin-post-index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
@endsection