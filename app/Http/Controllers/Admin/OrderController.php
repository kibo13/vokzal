<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index()
  {
    // orders
    $orders = Order::where('status', 1)->orderBy('created_at', 'DESC')->get();

    return view('admin.pages.orders.index', compact('orders'));
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function edit(Order $order)
  {
    return view('admin.pages.orders.form', compact('order'));
  }

  public function update(Request $request, Order $order)
  {
    $order->update($request->all());
    return redirect()->route('orders.index');
  }

  public function destroy(Order $order)
  {
    $order->delete();
    return redirect()->route('orders.index');
  }
}