@extends('admin.layouts.master')

@section('title', __('main.orders'))

@section('content')
<section id="order-form" class="section info-form">
  <h2 class="mb-3">
    {{ __('main.order') }} №{{ $order->code }}
  </h2>

  <form class="bk-form" action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
      <div class="bk-form__block">

        <!-- /.date_in and time_in -->
        <h6 class="bk-form__title">{{ __('main.order_time') }}</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ getDMY($order->date_in) }}
            <span class="bk-small">{{ getHI($order->time_in) }}</span>
          </p>
        </div>

        <!-- /.last_name and first_name -->
        <h6 class="bk-form__title">{{ __('main.customer') }}</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $order->last_name }} {{ $order->first_name }}
          </p>
        </div>

        <!-- /.address -->
        <h6 class="bk-form__title">{{ __('main.area') }} / {{ __('main.address') }}</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ $order->area_id ? $order->area->name_ru : '-' }} / {{ $order->street }} {{ $order->dom }}-{{ $order->flat }}
          </p>
        </div>

        <!-- /.order list -->
        <h6 class="bk-form__title">{{ __('main.order_list') }}</h6>
        <div class="bk-form__field-full mb-2">
          <table class="bk-table table table-bordered table-responsive mb-0">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th class="w-100" style="min-width: 200px;">{{ __('main.t_name') }}</th>
                <th class="text-center" style="min-width: 150px;">{{ __('main.count') }}</th>
                <th class="text-center" style="min-width: 150px;">{{ __('main.price') }}</th>
                <th class="text-center" style="min-width: 150px;">{{ __('main.sum') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->dishes as $i => $dish)
              <tr>
                <td>{{ $i+=1 }}</td>
                <td>
                  <div class="bk-btn-info">
                    <ul class="orders-list">
                      <li class="orders-list__title">
                        @if(getCurrentLang() === 'ru')
                        {{ $dish->name_ru }}
                        @elseif(getCurrentLang() === 'en')
                        {{ $dish->name_en }}
                        @else
                        {{ $dish->name_kk }}
                        @endif
                      </li>
                      <li class="orders-list__category">
                        @if(getCurrentLang() === 'ru')
                        {{ $dish->continent->name_ru }} / {{ $dish->assortment->name_ru }}
                        @elseif(getCurrentLang() === 'en')
                        {{ $dish->continent->name_en }} / {{ $dish->assortment->name_en }}
                        @else
                        {{ $dish->continent->name_kk }} /  {{ $dish->assortment->name_kk }}
                        @endif
                      </li>
                      <li class="orders-list__desc">
                        @if(getCurrentLang() === 'ru')
                        {{ $dish->desc_ru }}
                        @elseif(getCurrentLang() === 'en')
                        {{ $dish->desc_en }}
                        @else
                        {{ $dish->desc_kk }}
                        @endif
                      </li>
                    </ul>
                    <button
                      class="bk-btn-info__triangle bk-btn-info__triangle--down"
                      type="button"
                      title="{{ __('main.more') }}">
                    </button>
                  </div>
                </td>
                <td class="text-center">{{ $dish->pivot->count }} шт.</td>
                <td class="text-center">{{ number_format($dish->price, 2, ',', ' ') }} тг</td>
                <td class="text-center">{{ number_format($dish->getPriceForCount(), 2, ',', ' ') }} тг</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- /.total -->
        <h6 class="bk-form__title">{{ __('main.total') }}</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            {{ number_format($order->total, 2, ',', ' ') }} тг
          </p>
        </div>

        <!-- /.pay -->
        <h6 class="bk-form__title">{{ __('main.pay') }}</h6>
        <div class="bk-form__field-full mb-2">
          <p class="orders-text">
            @if($order->pay == 1) {{ __('main.order_card') }} @endif
            @if($order->pay == 2) {{ __('main.order_cash') }} @endif
          </p>
        </div>

        <!-- /.status -->
        <h6 class="bk-form__title">{{ __('main.order_check') }}</h6>
        <div class="orders-control">
        @if($order->pay == 1)
          <p class="orders-text">
            @if($order->check == 1) <span class="text-success">оплачено</span> @endif
            @if($order->check == 0) <span class="text-danger">не оплачено</span> @endif
          </p>
        @else
          <input type="hidden" name="check" value="0">
          <input
              class="form-control orders-control__check"
              id="check"
              type="checkbox"
              name="check"
              value="1"
              @if($order->check) checked @endif />
          <label class="orders-control__label" for="check">оплачено</label>
        @endif
      </div>

      </div>
    </div>

    <div class="form-group">
      <button
        class="btn btn-outline-success"
        type="submit">{{ __('main.save') }}</button>
      <a
        class="btn btn-outline-secondary"
        href="{{ route('orders.index') }}">
        {{ __('main.back') }}
      </a>
    </div>
  </form>
</section>
@endsection
