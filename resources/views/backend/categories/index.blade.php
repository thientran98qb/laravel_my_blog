@extends('layouts.app')
@section('title', 'All categories')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> All categories </h2>
            </div>
            <div class="panel-body">
                <div class="mb-5">
                    <a href="{{route('admin-category-add')}}" class="btn btn-info">Add Category</a>
                </div>
                @if (session()->has('status'))
                    <p class="alert alert-success">
                        {{ session()->get('status') }}
                    </p>
                @endif
                @if ($categories->isEmpty())
                <p> There is no category.</p>
                @else
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <td><a href="{{route('admin-category-edit',$category->id)}}">{!! $category->name !!}</a></td>
                            <td>
                                <form action="{{route('admin-category-delete',$category->id)}}" method="post">
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection