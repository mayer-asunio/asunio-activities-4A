@extends('layouts.app')

@section('content')

<div class="card p-4 text-center">

    <h4>{{ $product->name }}</h4>

    <p class="text-muted">{{ $product->description ?? 'No description' }}</p>

    <h5>₱{{ number_format($product->price, 2) }}</h5>

    <div class="qr-box my-3">
        {!! $qr !!}
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>

@endsection