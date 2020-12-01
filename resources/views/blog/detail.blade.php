@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! $post->title !!}
            </div>
            <div class="panel-body">
                {!! mb_substr($post->content,0,500) !!}
            </div>
        </div>
        @foreach($comments as $comment)
            <div class="well well bs-component">
                <div class="content">
                    {!! $comment->content !!}
                </div>
            </div>
        @endforeach
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>Comment</p>
            </div>
            <div class="panel-body">
                <form action="{{route('comment')}}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="post_type" value="App\Models\Post">
                    <div class="form-group">
                        <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Comment">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection