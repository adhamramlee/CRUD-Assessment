@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Product</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product_name">Name :</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name"
                    required>
            </div>

            <div class="form-group">
                <label for="price">Price (RM) :</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Price" required>
            </div>

            <div class="form-group">
                <label for="product_detail">Detail :</label>
                <textarea name="product_detail" id="product_detail" class="form-control" placeholder="Product Detail"
                    rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Publish :</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-group text-right">
                <div class="form-group">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Product List
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection