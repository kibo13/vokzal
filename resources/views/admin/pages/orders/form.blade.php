@extends('admin.layouts.master')

@section('title', __('main.orders'))

@section('content')
<section id="order-form" class="section">
  <h2 class="mb-3">{{ __('main.edit_record') }}</h2>

  <form class="bk-form" action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
      <div class="bk-form__block">


        <!-- /.order -->


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
