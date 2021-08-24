@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<section id="vip-form" class="section img-form">
  <h2 class="mb-3">
    @isset($vip)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($vip)
      action="{{ route('vips.update', $vip) }}"
    @else
      action="{{ route('vips.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($vip)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
        <div class="bk-form__block">

          <!-- /.category_id -->
          <input
            class="form-control mb-2"
            id="category_id"
            type="hidden"
            name="category_id"
            value="{{ isset($vip) ? $vip->category_id : $category->id }}"
          >

          <!-- /.name_ru -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [RU]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_ru"
              type="text"
              name="name_ru"
              value="@isset($vip) {{ $vip->name_ru }} @endisset"
              placeholder="Введите название"
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
              value="@isset($vip) {{ $vip->name_en }} @endisset"
              placeholder="Enter a title"
              required />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [KK]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($vip) {{ $vip->name_kk }} @endisset"
              placeholder="Тақырыпты енгізіңіз"
              required />
          </div>

          <!-- /.image -->
          <h6 class="bk-form__title">{{ __('main.image') }}</h6>
          <div class="bk-form__field-300">
            <div class="bk-form__file">
              <input
                class="form-control"
                id="upload-file"
                name="note"
                type="text"
                value="@isset($vip) {{ $vip->note }} @endisset"
                placeholder="{{ __('main.nofile') }}" />

              <button
                type="button"
                class="btn btn-primary bk-form__file--btn">
                {{ __('main.upload') }}
              </button>

              <input
                class="form-control-file bk-form__file--upload"
                id="image"
                name="image"
                type="file"
                accept="image/*" >
            </div>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          type="submit">{{ __('main.save') }}</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('vips.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
