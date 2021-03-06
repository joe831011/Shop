@extends('layouts.master')
@section('title')
所有商品
@endsection
@section('content')
<div class="container">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('product_lists.create')}}" class="btn btn-success btn-sm">{{ __('common.Create data') }}</a>
        
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" style="table-layout : fixed;" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>product_id</th>
                    <th>product_name</th>
                    <th>category_name</th>
                    <th>product_price</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>operator</th>
                    <th>action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>product_id</th>
                    <th>product_name</th>
                    <th>category_name</th>
                    <th>product_price</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>operator</th>
                    <th>action</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach ($productlists as $productlist)
                    <tr>
                        <td align="center">{{ $productlist['product_id'] }}</td>
                        <td align="center">{{ $productlist['product_name'] }}</td>
                        <td align="center">{{ $productlist['category_name'] }}</td>
                        <td align="center">{{ $productlist['product_price'] }}</td>
                        <td align="center">{{ $productlist['created_at'] }}</td>
                        <td align="center">{{ $productlist['updated_at'] }}</td>
                        <td align="center">{{ $productlist['operator'] }}</td>
                        <td>
                            <a href="{{ route('product_lists.edit', $productlist->product_id) }}" class="btn btn-circle btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                            </a>
                            <form style="display:inline-block" action="{{ route('product_lists.destroy', $productlist->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-circle btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@if (session('alert_msg')!= '')
    <script>
        alert("{{ session('alert_msg') }}");
    </script>
@endif