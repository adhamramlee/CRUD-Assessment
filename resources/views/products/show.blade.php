@extends('layout')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Product Details Card -->
        <div class="card">
            <div class="card-header">
                <h2>Product Details</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID :</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th>Name :</th>
                        <td>{{ $product->product_name }}</td>
                    </tr>
                    <tr>
                        <th>Price (RM) :</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th>Details :</th>
                        <td>{{ $product->product_detail }}</td>
                    </tr>
                    <tr>
                        <th>Publish :</th>
                        <td>{{ ucfirst($product->status) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Back to Product List Button -->
        <div class="form-group">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Product List
            </a>
        </div>
    </div>
</section>
@endsection