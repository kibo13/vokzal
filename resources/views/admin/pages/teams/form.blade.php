@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<section id="team-form" class="section img-form">
  <h2 class="mb-3">
    @isset($team)
      {{ __('main.edit_record') }}
    @else
    {{ __('main.add_record') }}
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($team)
      action="{{ route('teams.update', $team) }}"
    @else
      action="{{ route('teams.store') }}"
    @endisset>
    @csrf
    <div>
      @isset($team)
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
            value="{{ isset($team) ? $team->category_id : $category->id }}"
          >

          <!-- /.position_id -->
          <h6 class="bk-form__title">{{ __('main.positions') }}</h6>
          <div class="bk-form__field-300 mb-2">
            <select class="form-control" name="position_id">
              <option disabled selected>{{ __('main.select_record') }}</option>
              @foreach($positions as $position)
              <option
                value="{{ $position->id }}"
                @isset($team)
                  @if($team->position_id == $position->id)
                    selected
                  @endif
                @endisset>
                @if(getCurrentLang() === 'ru')
                {{ $position->name_ru }}
                @elseif(getCurrentLang() === 'en')
                {{ $position->name_en }}
                @else
                {{ $position->name_kk }}
                @endif
              </option>
              @endforeach
            </select>
          </div>

          <!-- /.name_ru -->
          <h6 class="bk-form__title">{{ __('main.worker') }} [RU]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_ru"
              type="text"
              name="name_ru"
              value="@isset($team) {{ $team->name_ru }} @endisset"
              placeholder="Введите название"
              required />
          </div>

          <!-- /.name_en -->
          <h6 class="bk-form__title">{{ __('main.worker') }} [EN]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_en"
              type="text"
              name="name_en"
              value="@isset($team) {{ $team->name_en }} @endisset"
              placeholder="Enter a title"
              required />
          </div>

          <!-- /.name_kk -->
          <h6 class="bk-form__title">{{ __('main.worker') }} [KK]</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control"
              id="name_kk"
              type="text"
              name="name_kk"
              value="@isset($team) {{ $team->name_kk }} @endisset"
              placeholder="Тақырыпты енгізіңіз"
              required />
          </div>

          <!-- /.desc_ru -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [RU]</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control" name="desc_ru" placeholder="Введите описание">{{ old('desc_ru', isset($team) ? $team->desc_ru : null) }}</textarea>
          </div>

          <!-- /.desc_en -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [EN]</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control" name="desc_en" placeholder="Enter a description">{{ old('desc_en', isset($team) ? $team->desc_en : null) }}</textarea>
          </div>

          <!-- /.desc_kk -->
          <h6 class="bk-form__title">{{ __('main.t_desc') }} [KK]</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control" name="desc_kk" placeholder="Сипаттаманы енгізіңіз">{{ old('desc_kk', isset($team) ? $team->desc_kk : null) }}</textarea>
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
                value="@isset($team) {{ $team->note }} @endisset"
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
          href="{{ route('teams.index') }}">
          {{ __('main.back') }}
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
