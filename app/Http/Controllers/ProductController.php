<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        return $this->productsView($request->search ? ['search' => $request->search] : []);
    }

    protected function productsView(array $filters): View
    {
        return view('products.index', [
            'products' => Product::filters($filters)->latest()->paginate(10),
        ]);
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
