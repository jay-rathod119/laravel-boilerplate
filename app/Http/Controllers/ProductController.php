<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the public products listing.
     */
    public function __invoke(Request $request): View
    {
        $products = Product::query()
            ->orderBy('name')
            ->get();

        return view('item', [
            'products' => $products,
            'useWideMain' => true,
        ]);
    }
}
