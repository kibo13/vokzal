@extends('admin.layouts.master')

@section('title', __('main.log'))

@section('content')
<section id="order-form" class="section info-form">
  <h2 class="mb-3">
    {{ __('main.log') }} #{{ getInvoiceId($log->invoice_id) }}
  </h2>

  <form class="bk-form">

    <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
      <div class="bk-form__block">

        <!-- id -->
        <h6 class="bk-form__title">id</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->code }}
          </p>
        </div>

        <!-- dateTime -->
        <h6 class="bk-form__title">dateTime</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->date_time }}
          </p>
        </div>

        <!-- invoiceId -->
        <h6 class="bk-form__title">invoiceId</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ getInvoiceId($log->invoice_id) }}
          </p>
        </div>

        <!-- amount -->
        <h6 class="bk-form__title">amount</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->amount }}
          </p>
        </div>

        <!-- currency -->
        <h6 class="bk-form__title">currency</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->currency }}
          </p>
        </div>

        <!-- terminal -->
        <h6 class="bk-form__title">terminal</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->terminal }}
          </p>
        </div>

        <!-- accountId -->
        <h6 class="bk-form__title">accountId</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->account_id }}
          </p>
        </div>

        <!-- description -->
        <h6 class="bk-form__title">description</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if (is_null($log->description))
              <span class="text-primary">null</span>
            @else
              {{ $log->description }}
            @endif
          </p>
        </div>

        <!-- email -->
        <h6 class="bk-form__title">email</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if (is_null($log->email))
              <span class="text-primary">null</span>
            @else
              {{ $log->email }}
            @endif
          </p>
        </div>

        <!-- phone -->
        <h6 class="bk-form__title">phone</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if (is_null($log->phone))
              <span class="text-primary">null</span>
            @else
              {{ $log->phone }}
            @endif
          </p>
        </div>

        <!-- ip -->
        <h6 class="bk-form__title">ip</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->ip_address }}
          </p>
        </div>

        <!-- ipCountry -->
        <h6 class="bk-form__title">ipCountry</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->ip_country }}
          </p>
        </div>

        <!-- ipCity -->
        <h6 class="bk-form__title">ipCity</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->ip_city }}
          </p>
        </div>

        <!-- ipRegion -->
        <h6 class="bk-form__title">ipRegion</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if (is_null($log->ip_region))
              <span class="text-primary">null</span>
            @else
              {{ $log->ip_region }}
            @endif
          </p>
        </div>

        <!-- ipDistrict -->
        <h6 class="bk-form__title">ipDistrict</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if (is_null($log->ip_district))
              <span class="text-primary">null</span>
            @else
              {{ $log->ip_district }}
            @endif
          </p>
        </div>

        <!-- cardId -->
        <h6 class="bk-form__title">cardId</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->card_id }}
          </p>
        </div>

        <!-- code -->
        <h6 class="bk-form__title">code</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->status }}
          </p>
        </div>

        <!-- reason -->
        <h6 class="bk-form__title">reason</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $log->reason }}
          </p>
        </div>

        <!-- reasonCode -->
        <h6 class="bk-form__title">reasonCode</h6>
        <div class="bk-form__field-full">
          <p class="orders-text">
            {{ $log->reason_code }}
          </p>
        </div>

      </div>
    </div>

    <div class="form-group">
      <a
        class="btn btn-outline-secondary"
        href="{{ route('logs.index') }}">
        {{ __('main.back') }}
      </a>
    </div>
  </form>
</section>
@endsection
