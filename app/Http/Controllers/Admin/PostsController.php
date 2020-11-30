<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostFormRequest $request)
    {
        $user=Auth::user()->id;
        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'slug'=>Str::slug($request->title),
            'user_id'=>$user
        ]);
        $post->categories()->sync($request->categories);
        return redirect()->route('admin-post-index')->with('status','Add Post Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::whereId($id)->firstOrFail();
        $categories=Category::all();
        $categorySelected=$post->categories->pluck('id')->toArray();
        return view('backend.posts.edit',compact('post','categories','categorySelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::whereId($id)->firstOrFail();
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'slug'=>Str::slug($request->title)
        ]);
        $post->categories()->sync($request->categories);
        return redirect()->route('admin-post-index')->with('status','Update Post Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
