<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function success()
  {
    // session
    $transaction = session('transaction');

    dd($transaction);

    // $payment = Payment::first();
    // return view('payment', compact('payment'));
  }

  public function payment(Request $request)
  {
    // response from bank
    $response = json_decode($request);

    // session
    $transaction = session('transaction');

    // put response to session
    if (is_null($transaction)) {
      Payment::create([
        'id' => $response->id,
        'amount' => $response->amount,
        'invoice_id' => $response->invoiceId
      ]);

      session(['transaction' => $response]);
    }
  }
}