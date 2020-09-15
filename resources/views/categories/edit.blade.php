@extends('layouts.master')
@section('title')
修改資料
@endsection
@section('content')
<div class="container">
    <form method="post" action="{{ route('categories.update', $data[0]->category_id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="category_name">商品類別</label>
            <input type="text" class="form-control" name="category_name" value="{{ $data[0]->category_name }}">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
        <a href="{{route('categories.index')}}" class="btn btn-secondery btn-sm">返回</a>
    </form>
@endsection

