@extends('layouts.app')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Products</h3>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        + Add Product
    </a>
</div>

<form method="GET" class="card p-3 mb-4">
    <div class="row g-2">

        <div class="col-md-4">
            <select name="sort" class="form-select">
                <option value="">Sort By</option>
                <option value="name_asc" {{ request('sort')=='name_asc'?'selected':'' }}>Name (A-Z)</option>
                <option value="name_desc" {{ request('sort')=='name_desc'?'selected':'' }}>Name (Z-A)</option>
                <option value="price_low" {{ request('sort')=='price_low'?'selected':'' }}>Price (Low-High)</option>
                <option value="price_high" {{ request('sort')=='price_high'?'selected':'' }}>Price (High-Low)</option>
            </select>
        </div>

        <div class="col-md-3">
            <input type="number" name="min" class="form-control" placeholder="Min Price" value="{{ request('min') }}">
        </div>

        <div class="col-md-3">
            <input type="number" name="max" class="form-control" placeholder="Max Price" value="{{ request('max') }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-dark w-100">Filter</button>
        </div>

    </div>
</form>

<div class="row">

    @forelse($products as $product)

    <div class="col-md-4 mb-4">

        <div class="card p-3 h-100">

            <h5 class="fw-bold">{{ $product->name }}</h5>

            <p class="text-muted small mb-2">
                {{ Str::limit($product->description, 60) }}
            </p>

            <h6 class="text-primary mb-2">
                ₱{{ number_format($product->price, 2) }}
            </h6>

            <div class="qr-box my-2">
                <div class="d-flex justify-content-start">
                {!! QrCode::size(130)->generate(route('products.show', $product->id)) !!}
                </div>
            </div>

            <div class="d-flex gap-1 flex-wrap">

                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>

                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this product?')">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

    @empty
        <p class="text-center text-muted">No products found</p>
    @endforelse

</div>

@endsection