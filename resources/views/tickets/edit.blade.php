@extends('layouts.app')
@section('title', 'Contact')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" action="{{route('ticket-update',$ticket->slug)}}" method="post">
                @csrf
                <fieldset>
                    <legend>Submit a new ticket</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" value="{{$ticket->title}}" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" name="content" id="content">{{$ticket->content}}</textarea>
                            <span class="help-block">Feel free to ask us any question.
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-10">
                            <input type="checkbox" name="status" id="" {{($ticket->status == 1 ? 'checked' : '')}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="{{route('ticket-detail',$ticket->slug)}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection