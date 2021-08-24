@extends('admin.layouts.master')

@section('title', __('main.hall_types'))

@section('content')
<section id="hall-type-form" class="section">
  <h2 class="mb-3">
    @isset($hall_type)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($hall_type)
      action="{{ route('hall-types.update', $hall_type) }}"
    @else
      action="{{ route('hall-types.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($hall_type)
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
              value="@isset($hall_type) {{ $hall_type->name_ru }} @endisset"
              placeholder="Новая запись"
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
              value="@isset($hall_type) {{ $hall_type->name_en }} @endisset"
              placeholder="New record"
              required />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [KK]</h6>
          <div class="bk-form__field-300">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($hall_type) {{ $hall_type->name_kk }} @endisset"
              placeholder="Жаңа жазба"
              required />
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          type="submit">{{ __('main.save') }}</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('hall-types.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
