<?php

namespace App\Livewire;

use Livewire\Component;

class OrderForm extends Component
{
    public $product;
    public $product_id;
    public $name;
    public $phone;
    public $city;
    public $district;
    public $address;
    public $total_price;
    public $quantity = 1; //PROBLEM HERE;



    public function mount($product)
    {
        $this->product = $product;
        $this->total_price = $product->price * $this->quantity;
    }

    public function submitForm()
    {
        dd($this->quantity);
        if ($this->validate(
            [
                'name' => 'required|string',
                'phone' => 'required|string',
                'city' => 'required|string',
                'district' => 'required|string',
                'address' => 'required|string',
            ]
        )) {
            $data = ([
                'product_id' => $this->product->id,
                'name' => $this->name,
                'phone' => $this->phone,
                'city' => $this->city,
                'quantity' => $this->quantity,
                'district' => $this->district,
                'address' => $this->address,
                'total_price' => $this->total_price * $this->quantity,
            ]);
            $order = $this->product->orders()->create($data);
            $order->save();
            $this->product->decrement('stock', $data['quantity']);

            $this->reset(['name', 'phone', 'quantity']);
            session()->flash('message', 'Commande placée !');
            return redirect()->route('index');
        }
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
