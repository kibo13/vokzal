<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

  // merchant
  private $terminalID   = '67e34d63-102f-4bd1-898e-370781d0074d';
  private $clientID     = 'test';
  private $clientSecret = 'yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG';

  // auth-token
  private $url = 'https://testoauth.homebank.kz/epay2/oauth2/token';

  public function getTokenForPayment(Request $request)
  {
    $response = Http::asForm()->post($this->url, [
      'grant_type'       => "client_credentials",
      'scope'            => "payment",
      'client_id'        => $this->clientID,
      'client_secret'    => $this->clientSecret,
      'invoiceID'        => $request->order,
      'amount'           => $request->amount,
      'currency'         => "KZT",
      'terminal'         => $this->terminalID,
      'postLink'         => "",
      'failurePostLink'  => ""
    ]);

    return json_decode($response);
  }

  public function test()
  {
    $response = Payment::get();

    return view('test', compact('response'));
  }

  public function success(Request $request)
  {
    Payment::create([
      'code'          => $request->id,
      'amount'        => $request->amount,
      'currency'      => $request->currency,
      'terminal'      => $request->terminal,
      'account_id'    => $request->accountId,
      'description'   => $request->description,
      'email'         => $request->email,
      'phone'         => $request->phone,
      'ip_address'    => $request->ip,
      'ip_country'    => $request->ipCountry,
      'ip_city'       => $request->ipCity,
      'ip_region'     => $request->ipRegion,
      'ip_district'   => $request->ipDistrict,
      'card_id'       => $request->cardId,
      'status'        => $request->code,
      'reason'        => $request->reason,
      'reason_code'   => $request->reasonCode
    ]);
  }

  public function failure(Request $request)
  {
    Payment::create([
      'code'          => $request->id,
      'amount'        => $request->amount,
      'currency'      => $request->currency,
      'terminal'      => $request->terminal,
      'account_id'    => $request->accountId,
      'description'   => $request->description,
      'email'         => $request->email,
      'phone'         => $request->phone,
      'ip_address'    => $request->ip,
      'ip_country'    => $request->ipCountry,
      'ip_city'       => $request->ipCity,
      'ip_region'     => $request->ipRegion,
      'ip_district'   => $request->ipDistrict,
      'card_id'       => $request->cardId,
      'status'        => $request->code,
      'reason'        => $request->reason,
      'reason_code'   => $request->reasonCode
    ]);
  }
}