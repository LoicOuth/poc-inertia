<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Products/Index');
    }

    public function create()
    {
        return Inertia::render('Admin/Products/Create');
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index');
    }
}
