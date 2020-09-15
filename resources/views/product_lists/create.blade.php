@extends('layouts.master')
@section('title')
新增資料
@endsection
@section('content')
<div class="container">
    <form method="post" action="{{route('product_lists.store')}}">
        @csrf
        <div class="form-group">
            <label for="product_name">商品名稱</label>
            <input type="text" class="form-control" name="product_name" value="">
        </div>
        <div class="form-group">
            <label for="category_id">商品類別</label>
            <br>
            {{ Form::select('category_id', $category_lists) }}
        </div>
        <div class="form-group">
            <label for="product_price">商品價格</label>
            <input type="text" class="form-control" name="product_price" value="">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
        <a href="{{route('product_lists.index')}}" class="btn btn-secondery btn-sm">返回</a>
    </form>
@endsection

