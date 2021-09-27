<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function success()
  {
    $payment = Payment::first();

    return view('payment', compact('payment'));
  }

  public function payment(Request $request)
  {

    $response = json_decode($request);

    Payment::create([
      'id' => $response->id,
      'amount' => $response->amount,
      'invoice_id' => $response->invoiceId
    ]);
  }
}