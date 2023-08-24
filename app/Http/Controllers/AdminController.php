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

    public function index(): View
    {
        return view('admin.index'); //TODO TO CREATE
    }
    public function createProduct(): View
    {
        return view('admin.createProduct'); //TODO TO CREATE
    }
    public function showOrders(): View
    {
        return view('admin.showOrders'); //TODO TO CREATE
    }
}
