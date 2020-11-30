@extends('layouts.app')
@section('title', 'View all tickets')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h2> Tickets </h2>
        </div>
            @if (session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
            @endif
            <a href="{{route('ticket-add')}}" class="btn btn-primary">Add Ticket</a>
            @if ($tickets->isEmpty())
                <p> There is no ticket.</p>
            @else
                <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{!! $ticket->id !!} </td>
                    <td>
                        <a href="{{route('ticket-detail',$ticket->slug)}}">{!! $ticket->title !!}</a>
                    </td>
                    <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection