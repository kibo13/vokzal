@extends('layouts.master')

@section('title', __('main.order_in'))

@section('background-header', 'cart__screen')
@section('background-content', 'is_cart')
@section('background-footer', 'custom__footer')

@section('section-content')
<div class="order__title--section">
  <div class="container-md">
    <div class="order__title--inner">
      <p>{{ __('main.order_in_3') }}</p>
      <a href="{{ route('deliveries') }}" class="order__button">
        @include('assets.icons.back')
        <span class="d-none d-lg-flex">{{ __('main.back') }}</span>
      </a>
    </div>
  </div>
</div>
<div class="cart__section section">
  <div class="container-md">
    @if($order == null || $order->getFullPrice() == 0)
    <h2 class="d-flex justify-content-center">
      {{ __('main.cart_empty') }}
    </h2>
    @else
    <div class="cart__inner--block d-flex justify-content-between">
      <div class="form__wrapper">
        <div class="form__step">
          {{ __('main.step') }}
          {{ $order->step }}
        </div>
        <div class="form__wrapper--inner">
          <!-- /.steps -->
          <div class="form__wrapper--form">

            <!-- /.step-1 -->
            <div class="form__contacts @if($order->step == 1) active @endif">
              <form id="form-contact" action="{{ route('carts.step_1', $order->id) }}" method="POST">
                @csrf
                <div class="form__contacts--title form-title">
                  1. {{ __('main.contact_data') }}
                </div>
                <div class="form__contacts--block">
                  <div class="row gx-4 gy-3">
                    <div class="input__wrapper col-12 col-lg-6 d-flex flex-column">
                      <label for="first_name">{{ __('main.first_name') }}</label>
                      <input
                        name="first_name"
                        id="first_name"
                        type="text"
                        value="{{ $order->first_name ?? null }}"
                        autocomplete="off"
                        placeholder="{{ __('main.fn_hint') }}"
                        required />
                    </div>
                    <div class="input__wrapper col-12 col-lg-6 d-flex flex-column">
                      <label for="last_name">{{ __('main.last_name') }}</label>
                      <input
                        name="last_name"
                        id="last_name"
                        type="text"
                        value="{{ $order->last_name ?? null }}"
                        placeholder="{{ __('main.ln_hint') }}"
                        autocomplete="off"
                        required />
                    </div>
                    <div class="input__wrapper col-12 col-lg-6 d-flex flex-column" >
                      <label for="phone">{{ __('main.phone') }}</label>
                      <input
                        name="phone"
                        id="phone"
                        type="text"
                        value="{{ $order->phone ?? null }}"
                        placeholder="{{ __('main.input_phone') }}"
                        autocomplete="off"
                        required />
                    </div>
                    <input type="hidden" name="step" value="2">
                  </div>
                  <button class="form__contacts--button block-button">
                    {{ __('main.further') }}
                  </button>
                </div>
              </form>
            </div>
            <!-- /.step-2 -->
            <div class="form__delivery @if($order->step == 2) active @endif">
              <form action="{{ route('carts.step_2', $order->id) }}" method="POST">
                @csrf
                <div class="form-title">2. {{ __('main.delivery') }}</div>
                <div class="form__delivery--block">
                  <div class="row gx-4 gy-3">
                    <div class="input__wrapper col-12 col-lg-6 d-flex flex-column bk-wrapper">
                      <label for="area">{{ __('main.area') }}</label>
                      <select class="bk-select" id="select-area">
                        <option disabled selected>{{ __('main.select_area') }}</option>
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}">
                          @if(getCurrentLang() === 'ru')
                          {{ $area->name_ru }}
                          @elseif(getCurrentLang() === 'en')
                          {{ $area->name_en }}
                          @else
                          {{ $area->name_kk }}
                          @endif
                        </option>
                        @endforeach
                      </select>
                      <input
                        class="bk-input"
                        type="text"
                        id="area_id"
                        name="area_id"
                        required />
                    </div>
                    <div class="input__wrapper col-12 col-lg-6 d-flex flex-column">
                      <label for="street">{{ __('main.address_delivery') }}</label>
                      <input
                        name="street"
                        id="street"
                        type="text"
                        value="{{ $order->street ?? null }}"
                        placeholder="{{ __('main.address_delivery') }}"
                        autocomplete="off"
                        required />
                    </div>
                    <div class="input__wrapper col-12 col-lg-4 d-flex flex-column">
                      <label for="dom">{{ __('main.house') }}</label>
                      <input
                        name="dom"
                        id="dom"
                        type="text"
                        value="{{ $order->dom ?? null }}"
                        placeholder="{{ __('main.house') }}"
                        autocomplete="off"
                        required />
                    </div>
                    <div class="input__wrapper col-12 col-lg-4 d-flex flex-column">
                      <label for="corp">{{ __('main.corp') }}</label>
                      <input
                        name="corp"
                        id="corp"
                        type="text"
                        value="{{ $order->corp ?? null }}"
                        autocomplete="off"
                        placeholder="{{ __('main.corp') }}" />
                    </div>
                    <div class="input__wrapper col-12 col-lg-4 d-flex flex-column">
                      <label for="flat">{{ __('main.flat') }}</label>
                      <input
                        name="flat"
                        id="flat"
                        type="number"
                        value="{{ $order->flat ?? null }}"
                        autocomplete="off"
                        placeholder="{{ __('main.flat') }}" />
                    </div>
                    <input type="hidden" name="step" value="3">
                  </div>
                  <button class="form__contacts--button block-button">
                    {{ __('main.further') }}
                  </button>
                </div>
              </form>
            </div>
            <!-- /.step-3 -->
            <div class="form__payment  @if($order->step == 3) active @endif">
              <div class="form-title">3. {{ __('main.pay') }}</div>
              <div class="form__payment--inner d-flex">
                <div class="form__payment--item position-relative">
                  <label class="payment-item" for="pay-card">
                    @include('assets.icons.credit')
                  </label>
                  <input type="radio" class="payment-toggle" id="pay-card" name="pay" value="1">
                  <p class="bk-text">{{ __('main.credit') }}</p>
                </div>
                <div class="form__payment--item position-relative">
                  <label class="payment-item" for="pay-cash">
                    @include('assets.icons.cash')
                  </label>
                  <input type="radio" class="payment-toggle" id="pay-cash" name="pay" value="2">
                  <p class="bk-text">{{ __('main.cash') }}</p>
                </div>
                <!-- ???????????? ???????????? -->
                <input type="hidden" id="pay-output">
                <!-- ?????????? ???????????? -->
                <input
                  type="hidden"
                  id="total"
                  value="{{ $order->area_id ? $order->getFullPrice() + $order->area->margin : $order->getFullPrice() }}">
              </div>
            </div>

            <input
              class="form__submit block-button"
              id="confirm-order"
              type="submit"
              data-order="{{ getInvoiceId($order->id) }}"
              data-id="{{ $order->id }}"
              @if($order->step != 3)
              disabled="disabled"
              style="cursor: not-allowed; background: #DEDEDE"
              @endif
              value="{{ __('main.buy') }}" />
          </div>
        </div>
      </div>
      <div class="cart__wrapper">
        <div class="cart__wrapper--text">
          {{ __('main.cart_count') }} <strong>{{ $order->dishes()->count() }}</strong> {{ __('main.items') }}:
        </div>
        <div class="cart__wrapper--inner">
          <!-- /.list -->
          <div class="cart__items">
            @foreach ($order->dishes as $dish)
            <div class="cart__item">
              <div class="cart__image">
                <img src="{{ asset('images/' . $dish->image) }}" alt="" />
              </div>
              <div class="cart__content">
                <div class="cart__desc">
                  @if(getCurrentLang() === 'ru')
                    {{ $dish->name_ru }}
                  @elseif(getCurrentLang() === 'en')
                    {{ $dish->name_en }}
                  @else
                    {{ $dish->name_kk }}
                  @endif
                </div>
                <div class="cart__btn--wrapper">
                  <div class="cart__btn">
                    <div class="cart__btn--nav cart-minus" data-id="{{ $dish->id }}">
                      @include('assets.icons.minus')
                    </div>
                    <div class="cart__input">
                      <input type="number" value="{{ $dish->pivot->count }}" />
                    </div>
                    <div class="cart__btn--nav cart-plus" data-id="{{ $dish->id }}">
                      @include('assets.icons.plus')
                    </div>
                  </div>
                  <div class="cart__per--price">?? {{ number_format($dish->price, 0, ',', ' '); }} ????</div>
                </div>
                <div class="cart__overall--price">
                  {{ number_format($dish->getPriceForCount(), 0, ',', ' ') }} ????
                </div>
              </div>
              <div class="cart__delete cart-destroy" data-id="{{ $dish->id }}">
                @include('assets.icons.trash')
              </div>
            </div>
            @endforeach
          </div>

          <!-- /.total -->
          <div class="cart__price">
            <div class="cart__price--sum">
              <p>{{ __('main.sum') }}</p>
              <div class="price__sum">
                <div class="sum-text">{{ __('main.total') }}</div>
                <div class="sum-num">{{ number_format($order->getFullPrice(), 0, ',', ' ') }} ????</div>
              </div>
              @isset($order->area_id)
              <div class="price__sum">
                <div class="sum-text">{{ __('main.delivery') }}</div>
                <div class="sum-num">{{ number_format($order->area->margin, 0, ',', ' ') }} ????</div>
              </div>
              @endisset
            </div>
            <div class="cart__price--pay">
              <div class="pay-text">{{ __('main.to_pay') }}</div>
              <div class="pay-num">
                {{
                  $order->area_id
                    ? number_format($order->getFullPrice() + $order->area->margin, 0, ',', ' ')
                    : number_format($order->getFullPrice(), 0, ',', ' ')
                }} ????
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
