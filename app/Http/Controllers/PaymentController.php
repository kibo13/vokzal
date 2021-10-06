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
    $url = config('constants.test');

    $request = Http::withToken('token')->post(
      $url['url'],
      [
        'grant_type'      => "client_credentials",
        'scope'           => "payment",
        'client_id'       => $url['client_id'],
        'client_secret'   => $url['client_secret'],
        'invoiceID'       => "209319741",
        'amount'          => 100,
        'currency'        => "KZT",
        'terminal'        => $url['terminal_id'],
        'postLink'        => "",
        'failurePostLink' => "",
      ]
    );

    $response = json_decode($request);

    dd($request);
  }

  public function success()
  {
    //
  }

  public function payment(Request $request)
  {



    // // response from bank
    // $response = json_decode($request);

    // dd($response);

    // return $response;

    // // session
    // $transaction = session('transaction');

    // // put response to session
    // if (is_null($transaction)) {
    //   Payment::create([
    //     'id' => $response->id,
    //     'amount' => $response->amount,
    //     'invoice_id' => $response->invoiceId
    //   ]);

    //   session(['transaction' => $response]);
    // }
  }
}
