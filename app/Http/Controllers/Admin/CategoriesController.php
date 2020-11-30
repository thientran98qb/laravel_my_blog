<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
        ]);
        $categoryName=Category::where('name',$request->name)->first();
        if($categoryName!=null){
            return redirect()->back()->withErrors(['status'=>'Category Name is exists']);
        }else{
            $category=Category::create([
                'name'=>$request->name
            ]);
            if($category){
                return redirect()->route('admin-category-index')->with('status','Add Category Successfully');
            }
            return redirect()->route('admin-category-index')->with('status','Add Category Failure');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::whereId($id)->firstOrFail();
        return view('backend.categories.edit',compact('category'));
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
        $request->validate([
            'name'=>'required|min:3'
        ]);
        $category=Category::whereId($id)->first();
        if($category!=null){
            $category->update([
                'name'=>$request->name
            ]);
            return redirect()->route('admin-category-index')->with('status','Update Successfully');
        }
        return redirect()->route('admin-category-index')->with('status','Update Fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::whereId($id)->firstOrFail();
        $category->delete();
        return redirect()->route('admin-category-index')->with('status','Delete Category Successfully');
    }
}
