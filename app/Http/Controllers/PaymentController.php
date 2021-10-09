<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

  public function requestTokenAuth(Request $request)
  {
    // token url
    $token = config('constants.test');

    $request = Http::asForm()->post(
      $token['url'],
      [
        'grant_type'      => "client_credentials",
        'scope'           => "payment",
        'client_id'       => $token['client_id'],
        'client_secret'   => $token['client_secret'],
        'invoiceID'       => $request->invoice_id,
        'amount'          => $request->amount,
        'currency'        => "KZT",
        'terminal'        => $token['terminal_id'],
        'postLink'        => "",
        'failurePostLink' => "",
      ]
    );

    $response = json_decode($request);

    if ($response) {
      return $response;
    } else {
      return false;
      // error
    }
  }

  public function payment(Request $request)
  {
    $response = json_decode($request);

    return $response;
  }

  public function success()
  {
    $response = Http::get('http://vokzal.test/ru/payment');

    dd($response);
  }
}