@extends('layouts.app')

@section('title', 'Products — ' . config('app.name'))

@push('styles')
    <style>
        main.main-wide {
            max-width: 76rem;
            padding-top: 2.2rem;
        }
        .catalog-shell {
            padding: 0;
            border: 0;
            background: transparent;
        }
        .product-grid {
            display: grid;
            gap: 1.6rem;
            grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
        }
        .product-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border: 1px solid #e7e7eb;
            border-radius: 14px;
            padding: 0.95rem;
            min-height: 33rem;
        }
        .product-card__media {
            border: 1px solid #efeff2;
            border-radius: 12px;
            background: #fff;
            height: 16.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem;
            margin-bottom: 1rem;
        }
        .product-card__media img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .product-card__placeholder {
            font-size: 0.9rem;
            color: #9ca3af;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .product-card__body {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex: 1;
            padding: 0 0.35rem;
        }
        .product-card__title {
            margin: 0;
            color: #151922;
            font-size: 1.86rem;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -0.01em;
        }
        .product-card__desc {
            margin: 0;
            color: #687082;
            font-size: 1.17rem;
            line-height: 1.56;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-card__cta {
            margin-top: auto;
            border-top: 1px solid #ececf0;
            padding-top: 0.85rem;
        }
        .product-card__cta-btn {
            width: 100%;
            height: 2.7rem;
            border: 1px solid #ebebef;
            border-radius: 8px;
            background: #fff;
            color: #151922;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            cursor: default;
        }
        @media (max-width: 1200px) {
            .product-card__title { font-size: 1.6rem; }
            .product-card__desc { font-size: 1.02rem; }
        }
        @media (max-width: 768px) {
            main.main-wide { padding: 1.2rem 1rem 2rem; }
            .product-grid { gap: 1rem; }
            .product-card { min-height: auto; }
            .product-card__title { font-size: 1.35rem; }
            .product-card__desc { font-size: 0.95rem; }
        }
    </style>
@endpush

@section('content')
    <div class="card catalog-shell">
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
                            @if ($product->description)
                                <p class="product-card__desc">{{ $product->description }}</p>
                            @else
                                <p class="product-card__desc" style="color: #a1a1aa;">No description</p>
                            @endif
                            <div class="product-card__cta">
                                <button class="product-card__cta-btn" type="button">
                                    View Composition <span aria-hidden="true">⌄</span>
                                </button>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
@endsection
