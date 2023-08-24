<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index'); //TODO TO CREATE
    }

    public function show(Request $request): View
    {
        return view('products.show'); //TODO TO CREATE
    }
}
