<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        return Inertia::render('Orders', [
            'ordersPaginate' => Order::where('user_id', Auth::id())->withCount('products')->withSum('products', 'price')->with('user')->paginate(5)
        ]);
    }

    public function create()
    {
        return Inertia::render('OrderCreate', [
            'productsPaginate' => Product::paginate(10)
        ]);
    }

    public function store(OrderStoreRequest $request)
    {
        $request->validated();

        $order = new Order();
        $order->user_id = AUth::id();
        $order->status = 'created';
        $order->save();

        $order->products()->attach($request->products);

        return redirect()->route('order.index');
    }

    public function delete(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }
}
