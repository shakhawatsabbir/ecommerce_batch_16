@extends('admin.master')

@section('title')
Edit Product
@endsection

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit product</h3>
                        <p>{{session('massage')}}</p>
                    </div>
                    <div class="card-body ">
                        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name"  type="text" value="{{$product->name}}" />
                                <label >Product Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="price"  type="text" value="{{$product->price}}" />
                                <label >Product Price</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"  type="text" name="category_name" value="{{$product->category_name}}" />
                                        <label >Category Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"  type="text" name="brand_name" value="{{$product->brand_name}}" />
                                        <label >Brand Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" >{{$product->description}}</textarea>
                                <label >Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="image"/>
                                <img src="{{asset($product->image)}}" alt="" class="img-fluid mb-2" height="50" width="50">
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
