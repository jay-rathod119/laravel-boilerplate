<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('brand/favicon-32.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('brand/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('brand/logo.png') }}">
    @stack('styles')
    <style>
        :root { color-scheme: light; }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, sans-serif;
            line-height: 1.5;
            color: #1a1a1a;
            background: #f4f4f5;
        }
        header {
            padding: 1rem 1.5rem;
            background: #fff;
            border-bottom: 1px solid #e4e4e7;
        }
        header nav { display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
        .site-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            margin-right: auto;
            color: #18181b;
            font-weight: 600;
            text-decoration: none;
        }
        .site-brand img {
            height: 2.25rem;
            width: auto;
            display: block;
        }
        .site-brand:hover { color: #18181b; }
        header a { color: #2563eb; text-decoration: none; }
        header a:hover { text-decoration: underline; }
        main {
            max-width: 40rem;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        main.main-wide {
            max-width: 56rem;
        }
        .card {
            background: #fff;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            padding: 1.5rem;
        }
        .catalog-intro {
            margin-bottom: 1.5rem;
            color: #52525b;
        }
        .catalog-intro h1 {
            margin: 0 0 0.35rem;
            font-size: 1.5rem;
            color: #18181b;
        }
        .product-grid {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: repeat(auto-fill, minmax(15.5rem, 1fr));
        }
        .product-card {
            display: flex;
            flex-direction: column;
            background: #fafafa;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
            transition: box-shadow 0.15s ease, transform 0.15s ease;
        }
        .product-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }
        .product-card__media {
            aspect-ratio: 4 / 3;
            background: linear-gradient(145deg, #e4e4e7, #f4f4f5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product-card__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .product-card__placeholder {
            font-size: 0.8rem;
            color: #a1a1aa;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        .product-card__body {
            padding: 1rem 1.1rem 1.15rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .product-card__title {
            margin: 0;
            font-size: 1.05rem;
            line-height: 1.35;
            color: #18181b;
        }
        .product-card__sku {
            margin: 0;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: #6366f1;
            background: #eef2ff;
            align-self: flex-start;
            padding: 0.2rem 0.5rem;
            border-radius: 6px;
        }
        .product-card__desc {
            margin: 0;
            font-size: 0.875rem;
            color: #52525b;
            line-height: 1.45;
            flex: 1;
        }
        .catalog-empty {
            text-align: center;
            padding: 2rem 1rem;
            color: #71717a;
            background: #fafafa;
            border-radius: 12px;
            border: 1px dashed #d4d4d8;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a class="site-brand" href="{{ url('/') }}">
                <img src="{{ asset('brand/logo.png') }}" alt="{{ config('app.name') }}">
                <span>{{ config('app.name') }}</span>
            </a>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/item') }}">Products</a>
        </nav>
    </header>
    <main @class(['main-wide' => ! empty($useWideMain)])>
        @yield('content')
    </main>
</body>
</html>
