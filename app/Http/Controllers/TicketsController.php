<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::all();
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $slug=uniqid();
        $params=$request->all();
        $data=[
            'title'=>$params['title'],
            'content'=>$params['content'],
            'slug'=>$slug
        ];
        $ticket=Ticket::create($data);
        if($ticket){
            return redirect()->route('ticket')->with('success','Add ticket successfully');
        }
        return redirect()->back()->with('fail','add ticket fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        $comments=$ticket->comments()->get();
        return view('tickets.show',compact('ticket','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        $slug=($request->status != null) ? 1 : 0;
        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'status'=>$slug
        ];
        $ticket->update($data);
        return redirect()->route('ticket')->with('success','Update ticket successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect()->route('ticket')->with('success','Delete ticket successfully');
    }
}
