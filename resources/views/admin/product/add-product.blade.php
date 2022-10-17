@extends('admin.master')
@section('title')
E-commerce || Add Product
@endsection

@section('content')
<div class="row">
    <h5 class="mb-5"><strong>Add Product Form</strong> </h5>
    <div class="col-xl-9 mx-auto">
        <h2 class="card-title" style="color:red;"> {{ session('message')}}</h2>
        <div class="card">
            <div class="card-body">
                <h6 class="text-center text-uppercase">Add Product</h6>
                <div class="p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                    </div>
                    <form action="{{ route('new.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_name" class="form-control" id="inputEnterYourName"
                                    placeholder="Enter Your Product Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_price" class="form-control" id="inputPhoneNo2"
                                    placeholder="Price">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAddress4" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="inputAddress4" rows="3"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Sub Image </label>
                            <div class="col-sm-3">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"
                                    placeholder="image">
                            </div>
                            <div class="col-sm-3">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"
                                    placeholder="image">
                            </div>
                            <div class="col-sm-3">
                                <input type="file" name="image" class="form-control" id="inputEmailAddress2"
                                    placeholder="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck4">
                                    <label class="form-check-label" for="gridCheck4">Check me out</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Add Product</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection()