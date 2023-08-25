<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /* ------------PRODUCTS SECTION------------ */

    public function adminProductIndex(): View
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }
    public function adminProductCreate(): View
    {
        return $this->showForm();
    }
    public function adminProductStore(ProductRequest $request)
    {
        //     $validated = $request->validate([
        //         'name' => 'required|min:3|max:255',
        //         'description' => 'required|min:10|max:1000',
        //         'price' => 'required|numeric|min:10|max:100000',
        //         'stock' => 'required|numeric|min:0|max:1000',
        //         'image' => 'required'
        //     ]);
        //     $product = Product::create($validated);
        //     $product->save();
        //     session()->flash('success', 'Product created successfully');
        //     return redirect()->route('admin.products.index');
        // }
        //
        return $this->save($request->validated());
    }
    protected function showForm(Product $product = new Product()): View
    {
        return view('admin.products.form', [
            'product' => $product,
        ]);
    }

    public function adminProductEdit(Product $product): View
    {
        return $this->showForm($product);
    }
    // public function adminProductUpdate(Product $product, Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|min:3|max:255',
    //         'description' => 'required|min:10|max:1000',
    //         'price' => 'required|numeric|min:10|max:100000',
    //         'stock' => 'required|numeric|min:0|max:1000',
    //         'image' => 'required'
    //     ]);
    //     $product->update($validated);
    //     session()->flash('success', 'Product updated successfully');
    //     return redirect()->route('admin.products.index');
    // }

    public function adminProductUpdate(ProductRequest $request, Product $product): RedirectResponse
    {
        return $this->save($request->validated(), $product);
    }

    public function adminProductDestroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Product deleted successfully');
        return redirect()->route('admin.products.index');
    }


    /* ------------ORDERS SECTION------------ */

    public function adminOrderIndex(): View
    {
        return view('admin.orders.index');
    }
    public function adminOrderShow(): View
    {
        return view('admin.orders.show');
    }
    public function adminOrderUpdate(Order $order, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);
        $order->update($validated);
        session()->flash('success', 'Order updated successfully');
        return redirect()->route('admin.orders.index');
    }
    public function adminOrderDestroy(Order $order)
    {
        $order->delete();
        session()->flash('success', 'Order deleted successfully');
        return redirect()->route('admin.orders.index');
    }
}
