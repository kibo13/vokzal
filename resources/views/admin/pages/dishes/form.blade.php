@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<section id="dish-form" class="section img-form valid-form">
  <h2 class="mb-3">
    @isset($dish)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($dish)
      action="{{ route('continents.dishes.update', $dish) }}"
    @else
      action="{{ route('continents.dishes.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($dish)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="{{ __('main.f_info') }}">
        <div class="bk-form__block">

          <!-- /.continent_id -->
          <input
            class="form-control mb-2"
            type="hidden"
            name="continent_id"
            value="{{ isset($dish) ? $dish->continent_id : $continent->id }}" >

          <!-- /.assortment_id -->
          <h6 class="bk-form__title">{{ __('main.category') }}</h6>
          <div class="bk-form__field-300 mb-2">
            <select class="form-control" id="assortment_id" name="assortment_id">
              <option disabled selected>{{ __('main.select_cat') }}</option>
              @foreach($continent->assortments as $assortment)
              <option
                value="{{ $assortment->id }}"
                @isset($dish)
                  @if($dish->assortment_id == $assortment->id)
                    selected
                  @endif
                @endisset>
                @if(getCurrentLang() === 'ru')
                {{ $assortment->name_ru }}
                @elseif(getCurrentLang() === 'en')
                {{ $assortment->name_en }}
                @else
                {{ $assortment->name_kk }}
                @endif
              </option>
              @endforeach
            </select>
          </div>

          <!-- /.name_ru -->
          <h6 class="bk-form__title">{{ __('main.t_name') }} [RU]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_ru"
              type="text"
              name="name_ru"
              value="@isset($dish) {{ $dish->name_ru }} @endisset"
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
              value="@isset($dish) {{ $dish->name_en }} @endisset"
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
              value="@isset($dish) {{ $dish->name_kk }} @endisset"
              placeholder="Тақырыпты енгізіңіз"
              required />
          </div>

          <!-- /.image -->
          <h6 class="bk-form__title">{{ __('main.image') }}</h6>
          <div class="bk-form__field-300 mb-2">
            <div class="bk-form__file">
              <input
                class="form-control"
                id="upload-file"
                name="note"
                type="text"
                value="@isset($dish) {{ $dish->note }} @endisset"
                placeholder="{{ __('main.nofile') }}"
                autocomplete="off" />

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

          <!-- /.price -->
          <h6 class="bk-form__title">
            {{ __('main.price') }}
            <span class="bk-small">&#8376;</span>
          </h6>
          <div class="bk-form__field-100 mb-2">
            <input
              class="form-control bk-number"
              id="price"
              type="text"
              name="price"
              value="{{ $dish->price ?? null }}"
              placeholder="1 700"
              required />
          </div>

          <!-- /.desc_ru -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [RU]</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control" name="desc_ru" placeholder="Введите описание">{{ old('desc_ru', isset($dish) ? $dish->desc_ru : null) }}</textarea>
          </div>

          <!-- /.desc_en -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [EN]</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control" name="desc_en" placeholder="Enter a description">{{ old('desc_en', isset($dish) ? $dish->desc_en : null) }}</textarea>
          </div>

          <!-- /.desc_kk -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [KK]</h6>
          <div class="bk-form__field-full">
            <textarea class="form-control" name="desc_kk" placeholder="Сипаттаманы енгізіңіз">{{ old('desc_kk', isset($dish) ? $dish->desc_kk : null) }}</textarea>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          type="submit">{{ __('main.save') }}</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('continents.dishes.show', $continent->id) }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
