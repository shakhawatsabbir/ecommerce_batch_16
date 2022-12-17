@extends('admin.master')

@section('title')
    add product
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add product</h3></div>
                        <div class="card-body">
                            <form action="{{route('new.product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="name"  type="text" placeholder="Product Name" />
                                    <label >Product Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="price"  type="text" placeholder="Product Price" />
                                    <label >Product Price</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control"  type="text" name="category_name" placeholder="Category" />
                                            <label >Category Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control"  type="text" name="brand_name" placeholder="Brand Name" />
                                            <label >Brand Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                    <label >Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" name="image"/>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><button href="login.html">Have an account? Go to login</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
