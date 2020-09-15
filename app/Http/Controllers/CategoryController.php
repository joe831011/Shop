<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //權限控管
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('category_id', 'ASC')->get();

        return view('categories.index' ,[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Category = New Category;
        $Category->category_name = $request->category_name;
        $Category->operator = Auth::id();
        $Category->save();
        return redirect()->route('categories.index')->with('alert_msg', __('common.Create successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $data = Category::where('category_id', $category_id)->get();
        if ( $data->count() > 0 ){
            return view('categories.edit', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $category->category_name = $request->category_name;
        $category->operator = Auth::id();
        $category->save();
        return redirect()->route('categories.index')->with('alert_msg', __('common.Update successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->route('categories.index')->with('alert_msg', __('common.Delete successfully'));
    }
}
