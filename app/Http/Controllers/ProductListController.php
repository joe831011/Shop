<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductList;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ProductListController extends Controller
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
        $productlists = ProductList::select('product_lists.*', 'categories.category_name')
        ->leftjoin('categories', 'product_lists.category_id', '=', 'categories.category_id')
        ->orderBy('product_id', 'ASC')
        ->get();
        return view('product_lists.index' ,[
            'productlists' => $productlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_lists = Category::orderBy('category_id', 'ASC')->pluck('category_name', 'category_id');
        return view('product_lists.create', compact('category_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productlist = New ProductList;
        $productlist->product_name = $request->product_name;
        $productlist->category_id = $request->category_id;
        $productlist->product_price = $request->product_price;
        $productlist->operator = Auth::id();
        $productlist->save();
        return redirect()->route('product_lists.index')->with('alert_msg', __('common.Create successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $data = ProductList::where('product_id', $product_id)->get();
        $category_lists = Category::orderBy('category_id', 'ASC')->pluck('category_name', 'category_id');
        if ( $data->count() > 0 ) {
            return view('product_lists.edit', compact('data', 'category_lists'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $productlist = ProductList::find($product_id);
        $productlist->product_name = $request->product_name;
        $productlist->category_id = $request->category_id;
        $productlist->product_price = $request->product_price;
        $productlist->operator = Auth::id();
        $productlist->save();
        return redirect()->route('product_lists.index')->with('alert_msg', __('common.Update successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $productlist = ProductList::findOrFail($product_id);
        $productlist->delete();
        return redirect()->route('product_lists.index')->with('alert_msg', __('common.Delete successfully'));
    }
}
