<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $request = Payment::first();

    return view('payment', compact('request'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    dd($request->all());
    // Payment::create([
    //   'id' => $request['id'],
    //   'amount' => $request['amount'],
    //   'invoice_id' => $request['invoiceId']
    // ]);

    // // dd($request);
    // $response = [
    //   'id' => $request->id,
    //   'amount' => $request->amount,
    //   'invoice_id' => $request->invoiceId
    // ];

    // return $response;
  }
}