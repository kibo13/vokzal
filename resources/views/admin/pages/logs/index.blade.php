@extends('admin.layouts.master')

@section('title', __('main.log'))

@section('content')
<section id="log-index" class="bk-page section">
  <h2 class="mb-3">{{ __('main.log') }}</h2>

  <table
    id="log-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25"style="min-width: 150px;">{{ __('main.order_code') }}</th>
        <th scope="col" class="w-25"style="min-width: 150px;">{{ __('main.order_time') }}</th>
        <th scope="col" class="w-25"style="min-width: 150px;">{{ __('main.total') }}</th>
        <th scope="col" class="w-25"style="min-width: 150px;">{{ __('main.state') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($logs as $key => $log)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ getInvoiceId($log->invoice_id) }}</td>
        <td>{{ $log->date_time}}</td>
        <td>{{ number_format($log->amount, 0, ' ', ' ') }} тг</td>
        <td>
          @if ($log->reason_code == 0)
          <span class="text-success">{{ $log->reason }}</span>
          @else
          <span class="text-danger">{{ $log->reason }}</span>
          @endif
        </td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--agree btn btn-primary"
              href="{{ route('logs.show', $log) }}"
              data-tip="{{ __('main.look') }}" ></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
