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

    // dd($url['url']);

    $request = Http::accept('application/json')->post(
      $url['url'],
      [
        'grant_type'      => "client_credentials",
        'scope'           => "payment",
        'client_id'       => 'test',
        'client_secret'   => 'yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG',
        'invoiceID'       => '1231312311',  // $request->invoiceId
        'amount'          => 100,          // $request->amount
        'currency'        => "KZT",
        'terminal'        => '67e34d63-102f-4bd1-898e-370781d0074d',
        'postLink'        => "",
        'failurePostLink' => "",
      ]
    );

    $response = json_decode($request);

    dd($response);
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
