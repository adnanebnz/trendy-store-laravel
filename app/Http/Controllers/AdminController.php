<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ContactMessage;
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
        $this->middleware('admin');
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
        $orders = Order::where('product_id', $product->id)->get();
        foreach ($orders as $order) {
            $order->delete();
        }
        $product->delete();
        return redirect()->route('admin.products.index')->withStatus(
            'Produit Supprimé !'
        );
    }

    protected function save(array $data, Product $product = null): RedirectResponse
    {
        if (isset($data['image'])) {
            //STORE IMAGE
            $uploadedFileUrl = Cloudinary::upload($data['image']->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        $data['slug'] = Str::slug($data['name']);
        $data['short_description'] = Str::limit($data['description'], 200);
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
    public function adminOrderEdit(Order $order): View
    {
        $product = Product::where('id', $order->product_id)->first();
        return view('admin.orders.edit', ['order' => $order, 'product' => $product]);
    }
    public function adminOrderUpdate(Order $order, Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $order->status = $data['status'];
        $order->save();
        return redirect()->route('admin.orders.index')->withStatus(
            'Commande Modifié !'
        );
    }
    public function adminOrderDestroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->withStatus(
            'Commande Supprimé !'
        );
    }
    /* ------------CONTACT SECTION------------ */

    public function adminContactIndex(): View
    {
        $contacts = ContactMessage::all();
        return view('admin.contacts.index', ['contacts' => $contacts]);
        // TODO TO CREATE
    }
    public function adminContactShow(ContactMessage $contact): View
    {
        return view('admin.contacts.show', ['contact' => $contact]);
        // TODO TO CREATE AND ADD IT TO NAVBAR
    }

    public function adminContactDestroy(ContactMessage $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->withStatus(
            'Contact Supprimé !'
        );
    }
}
