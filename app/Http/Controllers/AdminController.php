<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
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
        return view('admin.products.index');
    }
    public function adminProductCreate(): View
    {
        return view('admin.products.create');
    }
    public function adminProductStore()
    {
        //TODO TO IMPLEMENT
    }
    public function adminProductEdit(): View
    {
        return view('admin.products.edit');
    }
    public function adminProductUpdate()
    {
        //TODO TO IMPLEMENT
    }

    public function adminProductDestroy()
    {
        //TODO TO IMPLEMENT
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
    public function adminOrderUpdate()
    {
        //TODO TO IMPLEMENT
    }
    public function adminOrderDestroy()
    {
        //TODO TO IMPLEMENT
    }
}
