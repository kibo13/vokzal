<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Mail\OrderFormed;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
  // carts
  public function main(Request $request)
  {
    // flag
    $isCart = true;

    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    return view('pages.carts', compact('isCart', 'order'));
  }

  public function create($id)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // order doesn't exist
    if (is_null($order)) {
      $order = Order::create();
      session(['order_id' => $order->id]);
    }

    // order exists with dish_id
    if ($order->dishes->contains($id)) {
      $dish = $order->dishes()->where('dish_id', $id)->first();
      $dish->pivot->count += 1;
      $dish->pivot->update();
    }
    // order doesn't exists with dish_id
    else {
      $order->dishes()->attach($id, ['count' => 1]);
    }

    // for test
    return session('order');
  }

  // carts.age
  public function age()
  {
    session(['is_age' => 1]);
  }

  // carts.add
  public function add($dish)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    //dish
    $dish = $order->dishes()->where('dish_id', $dish)->first();
    $dish->pivot->count++;
    $dish->pivot->update();
  }

  // carts.del
  public function del($dish)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // dish
    $dish = $order->dishes()->where('dish_id', $dish)->first();

    if ($dish->pivot->count < 2) {
      $order->dishes()->detach($dish);
    } else {
      $dish->pivot->count--;
      $dish->pivot->update();
    }
  }

  // carts.destroy
  public function destroy($dish)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // dish
    $dish = $order->dishes()->where('dish_id', $dish)->first();
    $order->dishes()->detach($dish);
  }

  // carts.step_1
  public function step_1(Request $request, Order $order)
  {
    $order->update($request->all());
    return redirect()->back();
  }

  // carts.step_2
  public function step_2(Request $request, Order $order)
  {
    $order->update($request->all());
    return redirect()->back();
  }

  // carts.step_3
  public function step_3(Request $request, Order $order)
  {
    $order->code = getInvoiceId($order->id);
    $order->date_in = Carbon::now()->addHour(6)->format('Y-m-d');
    $order->time_in = Carbon::now()->addHour(6)->format('H:i');
    $order->status = $request->status;
    $order->pay = $request->pay;
    $order->total = $request->amount;
    $order->check = $request->check;
    $order->save();

    Mail::to('kimboris1310@gmail.com')->send(
      new OrderFormed($order)
    );

    session()->forget('order_id');
  }
}