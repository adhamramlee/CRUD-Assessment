@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Product List</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus-circle"></i> Create New Product
    </a>
</div>




<!-- Table with responsive design -->
<div class="card mt-3">
    <div class="card-header">
        <!-- Search Form -->
        <div class="d-flex justify-content-end">
            <form action="{{ route('products.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control form-control-sm" name="search"
                        placeholder="Search by Product Name" value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price (RM)</th>
                    <th style="width: 40%;">Details</th>
                    <th>Publish</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->product_detail }}</td>
                        <td>{{ ucfirst($product->status) }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-between">
            <div>{{ $products->links() }}</div>
            <div>Total: {{ $products->total() }} products</div>
        </div>
    </div>
</div>
@endsection