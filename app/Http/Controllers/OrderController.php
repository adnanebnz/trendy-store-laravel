<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // for user 
    public function store(Request $request)
    {
        $data =  $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'district' => 'required|string',
            'address' => 'required|string',
            'total_price' => 'required|numeric|min:0',
        ]);
        $order = Order::create($data);
        $order->save();
        $product = Product::where('id', $data['product_id']);
        $product->decrement('stock', 1);

        return redirect()->route('index')->withStatus(
            'Commande placée !'
        );
    }
}
