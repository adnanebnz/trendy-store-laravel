<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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

    public function adminProductUpdate(ProductRequest $request, Product $product): RedirectResponse
    {
        return $this->save($request->validated(), $product);
    }

    public function adminProductDestroy(Product $product)
    {
        if (isset($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();
        session()->flash('success', 'Product deleted successfully');
        return redirect()->route('admin.products.index');
    }

    protected function save(array $data, Product $product = null): RedirectResponse
    {
        if (isset($data['image'])) {
            if (isset($product->image)) {
                // Storage::delete($product->image);
                //DELETE IMAGE

            }
            //STORE IMAGE
            $uploadedFileUrl = Cloudinary::upload($data['image']->getRealPath())->getSecurePath();
            // $data['image'] = $data['image']->store('images');
        }
        $data['image'] = $uploadedFileUrl;

        $data['slug'] = Str::slug($data['name']);
        $product = Product::updateOrCreate(['id' => $product?->id], $data);

        return redirect()->route('product.show', ['product' => $product])->withStatus(
            $product->wasRecentlyCreated ? 'Produit publié !' : 'Produit mis à jour !'
        );
    }

    /* ------------ORDERS SECTION------------ */

    public function adminOrderIndex(): View
    {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function adminOrderShow(): View
    {
        return view('admin.orders.show');
    }
    public function adminOrderEdit(): View
    {
        return view('admin.orders.edit');
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
