@extends('admin.master')
@section('title')
Manage Product
@endsection

@section('content')

<h6 class="mb-0 text-uppercase">DataTable Example</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" style="height:60px; width:60px;" alt="" srcset="">
                        </td>
                        <td>{{ $product->status==1? 'published':'unpublished' }}</td>
                        <td class="d-flex justify-content">
                            @if($product->status==1)
                            <a href=" {{route ('status',['id'=>$product->id])}}" class="btn btn-primary me-2"><i
                                    class="fa-brands fa-creative-commons-by"></i></a>
                            @else
                            <a href=" {{route ('status',['id'=>$product->id])}}" class="btn btn-warning me-2"><i
                                    class="fa-solid fa-person-arrow-down-to-line"></i></a>
                            @endif
                            <a href=" {{route ('edit.product',['id'=>$product->id])}}" class="btn btn-success me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('delete.product')}}" method="POST" id="delete">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                <button type="submit" class="btn btn-danger" title="Delete"
                                    onclick="return confirm('Are You Sure delete this!!') "><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection