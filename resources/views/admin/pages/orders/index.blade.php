@extends('admin.layouts.master')

@section('title', __('main.orders'))

@section('content')
<section id="order-index" class="bk-page section">
  <h2 class="mb-3">{{ __('main.orders') }}</h2>

  <div class="bk-orders-table">
    <table
      id="order-table"
      class="bk-table table table-bordered table-responsive">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-100">Заказ</th>
          <th scope="col" class="no-sort">{{ __('main.t_action') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $key => $order)
        <tr>
          <td scope="row">{{ $key+=1 }}</td>
          <td>
            <a href="{{ $order->slug }}" class="" title="{{ __('main.go_to') }}">
              @if(getCurrentLang() === 'ru')
              {{ $order->name_ru }}
              @elseif(getCurrentLang() === 'en')
              {{ $order->name_en }}
              @else
              {{ $order->name_kk }}
              @endif
            </a>
          </td>
          <td>
            <div class="bk-btn-actions">
              <a
                class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
                href="{{ route('orders.edit', $order) }}"
                data-tip="{{ __('main.t_edit') }}" ></a>
              <a
                class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
                href="javascript:void(0)"
                data-id="{{ $order->id }}"
                data-table-name="order"
                data-toggle="modal"
                data-target="#bk-delete-modal"
                data-tip="{{ __('main.t_delete') }}" ></a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
