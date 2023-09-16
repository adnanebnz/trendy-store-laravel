<?php

namespace App\Livewire;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
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
    public $product_price;
    public $quantity = 1; //PROBLEM HERE;

    protected $listeners = ['setQuantity' => 'setQuantity'];
    public function setQuantity($newQuantity)
    {
        $this->quantity = $newQuantity;
    }
    public function mount($product)
    {
        $this->product = $product;
        if ($this->product->discount_price) {
            $this->product_price = $this->product->discount_price;
        } else {
            $this->product_price = $this->product->price;
        }
    }

    public function submitForm()
    {
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
                'total_price' => $this->product_price * $this->quantity,
            ]);
            $order = $this->product->orders()->create($data);
            $order->save();
            $this->product->decrement('stock', $data['quantity']);

            $this->reset(['name', 'phone', 'quantity']);
            session()->flash('message', 'Commande placée !');
            $order = Order::find($order->id);
            $data = [
                'order' => $order,
                // Add any other data you need for the invoice template
            ];

            $pdf = PDF::loadView('invoice.invoice', $data);

            // Save or send the PDF as needed
            // $pdf->save(storage_path('invoices/invoice.pdf'));
            // or
            // $pdf->stream(); // for immediate download

            return $pdf->download('invoice.pdf');
            //return redirect()->route('index');
        }
    }


    public function render()
    {
        return view('livewire.order-form');
    }
}
