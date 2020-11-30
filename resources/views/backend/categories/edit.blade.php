@extends('layouts.app')
@section('title', 'Create A New Category')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            <form class="form-horizontal" method="post" action="{{route('admin-category-edit',$category->id)}}">
                @csrf
                <fieldset>
                    <legend>Create a new category</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" value="{{ $category->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/admin/category" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection