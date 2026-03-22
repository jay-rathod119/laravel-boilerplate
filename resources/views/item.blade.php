@extends('layouts.app')

@section('title', 'Products — ' . config('app.name'))

@section('content')
    <div class="card">
        <div class="catalog-intro">
            <h1>Products</h1>
            <p style="margin: 0;">Browse our catalog. Stock is managed in the admin panel.</p>
        </div>

        @if ($products->isEmpty())
            <div class="catalog-empty">
                <p style="margin: 0 0 0.5rem;">No products yet.</p>
                <p style="margin: 0; font-size: 0.9rem;">Add products from the Filament admin under <strong>Products</strong>.</p>
            </div>
        @else
            <div class="product-grid">
                @foreach ($products as $product)
                    <article class="product-card">
                        <div class="product-card__media">
                            @if ($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >
                            @else
                                <span class="product-card__placeholder">No image</span>
                            @endif
                        </div>
                        <div class="product-card__body">
                            <h2 class="product-card__title">{{ $product->name }}</h2>
                            <p class="product-card__sku">SKU {{ $product->sku }}</p>
                            @if ($product->description)
                                <p class="product-card__desc">{{ $product->description }}</p>
                            @else
                                <p class="product-card__desc" style="color: #a1a1aa;">No description</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <p style="margin-top: 1.75rem;"><small><a href="{{ url('/') }}">Back to home</a></small></p>
    </div>
@endsection
