<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

  public function success()
  {
    $request = Http::post('https://vokzal.softdeco.kz/ru/payments/check', [
      "id" => "b78798d1-c7a5-43c6-8085-cf90dd509f3c",
      "dateTime" => "2021-09-22T15:33:04.007064+06:00",
      "invoiceId" => "9456567536346",
      "amount" => 100,
      "currency" => "KZT",
      "terminal" => "67e34d63-102f-4bd1-898e-370781d0074d",
      "accountId" => "test",
      "description" => "Оплата в интернет магазине",
      "language" => "RU",
      "cardMask" => "4003...9821",
      "cardType" => "VISA",
      "issuer" => "Казкоммерцбанк",
      "reference" => "126578313276",
      "secure" => "no",
      "tokenRecipient" => "",
      "code" => "ok",
      "reason" => "success",
      "reasonCode" => 0,
      "name" => "test",
      "email" => "example@example.com",
      "phone" => "77777777777",
      "ip" => "89.219.9.51",
      "ipCountry" => "Kazakhstan",
      "ipCity" => "Almaty",
      "ipRegion" => "",
      "ipDistrict" => "",
      "ipLongitude" => 76.9293,
      "ipLatitude" => 43.2638,
      "cardId" => "ca921f08-a6e2-46f5-9179-6cf1586e4ab9"
    ]);

    $response = json_decode($request);

    dd($response);

    // session
    // $transaction = session('transaction');
    // dd($transaction);
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