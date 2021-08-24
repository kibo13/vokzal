@extends('admin.layouts.master')

@section('title', __('main.sections'))

@section('content')
<section id="category-form" class="section img-form">
  <h2 class="mb-3">
    @isset($category)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($category)
      action="{{ route('categories.update', $category) }}"
    @else
      action="{{ route('categories.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($category)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
        <div class="bk-form__block">
          <!-- /.name_ru -->
          <h6 class="bk-form__title">{{ __('main.section') }} [RU]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_ru"
              type="text"
              name="name_ru"
              value="@isset($category) {{ $category->name_ru }} @endisset"
              placeholder="Новая категория"
              required />
          </div>

          <!-- /.name_en -->
          <h6 class="bk-form__title">{{ __('main.section') }} [EN]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_en"
              type="text"
              name="name_en"
              value="@isset($category) {{ $category->name_en }} @endisset"
              placeholder="New category"
              required />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.section') }} [KK]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($category) {{ $category->name_kk }} @endisset"
              placeholder="Жаңа категория"
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
                value="@isset($category) {{ $category->note }} @endisset"
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
          href="{{ route('categories.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
