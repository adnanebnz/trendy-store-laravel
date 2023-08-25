<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
            'district' => 'required|string',
            'address' => 'required|string',
            'total_price' => 'required|numeric|min:0',
        ]);

        Order::create($data);
        return redirect()->route('index')->with('success', 'Order created successfully');
    }
}
