<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $finalArr = [];

        for ($i = 1; $i < 12; $i++) {
            array_push($finalArr, Order::whereYear('created_at', '2022')->whereMonth('created_at', $i)->count());
        }

        return Inertia::render('Admin/Dashboard', [
            'ordersCount' => $finalArr
        ]);
    }
}
