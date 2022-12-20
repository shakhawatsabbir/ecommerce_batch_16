@extends('admin.master')

@section('title')
    Manage product
@endsection

@section('content')
    <main>
        <div class="card-body">
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <h4>Manage Product</h4>
                    <p>{{session('massage')}}</p>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                            <tbody>
                            <tr >
                                <th>#{{$loop->iteration}}</th>
                                <th>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{asset($product->image)}}" alt="" height="50" width="50" style=" border-radius: 50%">
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-name mb-1">{{$product->name}}</h6>
                                        </div>
                                    </div>
                                </th>
                                <td>${{$product->price}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{substr($product->description, 0,20)}}...</td>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <th>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">Edit</a>
                                        <a href="{{route('status.product',['id'=>$product->id])}}" class="btn btn-sm {{$product->status == 1 ? 'btn-success' : 'btn-warning'}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">{{$product->status == 1 ? 'Published' : 'Unpublished'}}</a>
                                        <form action="{{route('product.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
                                            <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </main>
@endsection
