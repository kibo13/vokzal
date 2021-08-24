<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Delivery;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
  public function main()
  {
    // flag
    $isPagination = true;

    // title
    $title = getCategoryTitle(config('constants.slug.deliveries'));

    // category
    $category = getCategory(config('constants.slug.deliveries'));

    // delivery
    $delivery = Delivery::first();

    // continent
    $continent = Continent::where('id', 3)->first();

    // menu
    $menu = Dish::where('continent_id', 3)->get();

    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    return view(
      'pages.deliveries',
      compact(
        'isPagination',
        'title',
        'category',
        'delivery',
        'continent',
        'menu',
        'order'
      )
    );
  }

  public function menu($id)
  {
    // flag
    $isPagination = true;

    // title
    $title = getCategoryTitle(config('constants.slug.deliveries'));

    // category
    $category = getCategory(config('constants.slug.deliveries'));

    // delivery
    $delivery = Delivery::first();

    // continent
    $continent = Continent::where('id', $id)->first();

    // menu
    $menu = Dish::where('continent_id', $id)->get();

    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    return view(
      'pages.deliveries',
      compact(
        'isPagination',
        'title',
        'category',
        'delivery',
        'continent',
        'menu',
        'order'
      )
    );
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.deliveries'));

    // category
    $category = getCategory(config('constants.slug.deliveries'));

    // delivery
    $delivery = Delivery::first();

    return view('admin.pages.deliveries.index', compact('title', 'category', 'delivery'));
  }

  public function update(Request $request, Delivery $delivery)
  {
    $delivery->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('deliveries.index');
  }
}