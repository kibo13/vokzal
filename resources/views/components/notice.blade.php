@component('mail::message')
# Новый заказ № {{ $order->code }}

### Клиент:
#### {{ $order->first_name }} {{ $order->last_name }}
#### {{ $order->phone }}

### Адрес:
#### г.{{ $order->city }}
#### ул.{{ $order->street }}
#### д.{{ $order->dom }}
@isset($order->corp)#### {{ $order->corp }} @endisset
@isset($order->flat)#### {{ $order->flat }} @endisset

### Способ оплаты:
@if($order->pay == 1)
#### карты
@else
#### наличные
@endif

### Итоговая сумма:
##### {{ number_format($order->total, 2, ',', ' ') }} тг

Детали заказа можно посмотреть в админ-панеле
@component('mail::button', ['url' => route('orders.index')])
Перейти
@endcomponent

@endcomponent
