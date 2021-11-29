@extends('admin.layouts.master')

@section('title', __('main.positions'))

@section('content')
<section id="position-form" class="section">
  <h2 class="mb-3">
    @isset($position)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($position)
      action="{{ route('teams.positions.update', $position) }}"
    @else
      action="{{ route('teams.positions.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($position)
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
              value="@isset($position) {{ $position->name_ru }} @endisset"
              placeholder="Введите название" />
          </div>

          <!-- /.name_en -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [EN]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_en"
              type="text"
              name="name_en"
              value="@isset($position) {{ $position->name_en }} @endisset"
              placeholder="Enter a title" />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [KK]</h6>
          <div class="bk-form__field-300">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($position) {{ $position->name_kk }} @endisset"
              placeholder="Тақырыпты енгізіңіз" />
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          type="submit">{{ __('main.save') }}</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('teams.positions.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection