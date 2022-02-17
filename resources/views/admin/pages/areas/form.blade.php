@extends('admin.layouts.master')

@section('title', __('main.areas'))

@section('content')
<section id="area-form" class="section valid-form">
  <h2 class="mb-3">
    @isset($area)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($area)
      action="{{ route('settings.areas.update', $area) }}"
    @else
      action="{{ route('settings.areas.store') }}"
    @endisset>
    @csrf

    <div>
      @isset($area)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
        <div class="bk-form__block">

          <!-- /.name_ru -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [RU]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_ru"
              type="text"
              name="name_ru"
              value="@isset($area) {{ $area->name_ru }} @endisset"
              placeholder="Введите название"
              autocomplete="off"
              required />
          </div>

          <!-- /.name_en -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [EN]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_en"
              type="text"
              name="name_en"
              value="@isset($area) {{ $area->name_en }} @endisset"
              placeholder="Enter a title"
              autocomplete="off" />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [KK]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($area) {{ $area->name_kk }} @endisset"
              placeholder="Тақырыпты енгізіңіз"
              autocomplete="off" />
          </div>

          <!-- /.margin -->
          <h6 class="bk-form__title">
            {{ __('main.price') }}
            <span class="bk-small">&#8376;</span>
          </h6>
          <div class="bk-form__field-100 mb-2">
            <input
              class="form-control bk-number"
              id="margin"
              type="text"
              name="margin"
              value="{{ $area->margin ?? null }}"
              placeholder="700"
              autocomplete="off"
              required />
          </div>

          <!-- /.is_active -->
          <h6 class="bk-form__title">
            {{ __('main.active') }}
          </h6>
          <div class="orders-control">
            <input type="hidden" name="is_active" value="0">
            <input
              class="form-control orders-control__check"
              id="check"
              type="checkbox"
              name="is_active"
              value="1"
              @isset($area) @if($area->is_active) checked @endif @endisset />
            <label class="orders-control__label" for="check">вкл/откл</label>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          id="area-submit"
          type="submit">{{ __('main.save') }}</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('settings.areas.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
