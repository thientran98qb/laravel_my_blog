@extends('layouts.app')
@section('title', 'View a ticket')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <a href="{{route('ticket')}}" class="btn btn-info">List Ticket</a>
        <div class="content">
            <h2 class="header">{!! $ticket->title !!}</h2>
        <p> <strong>Status</strong>: {!! $ticket->status ? 'Pending' : 'Answered' !!}</p>
        <p> {!! $ticket->content !!} </p>
        </div>
            <a href="{{route('ticket-edit',$ticket->slug)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('ticket-destroy',$ticket->slug)}}" method="POST" style="display: inline-block">
                @csrf
                <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete">
            </form>
        </div>
        @foreach($comments as $comment)
        <div class="well well bs-component">
            <div class="content">
                {!! $comment->content !!}
            </div>
        </div>
        @endforeach
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" action="{{route('comment')}}">
                @csrf
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="post_id" value="{!! $ticket->id !!}">
                <fieldset>
                    <legend>Reply</legend>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="{{route('ticket')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection