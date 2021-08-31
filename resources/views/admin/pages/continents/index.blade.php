@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<section id="continent-index" class="bk-page section info-form">
  <h2 class="mb-3"> {{ $title }} </h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('continents.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('continents.assortments.index') }}" >
      {{ __('main.categories') }}
    </a>
  </div>

  <ul class="bk-continents">
    @foreach($continents as $continent)
    <li class="bk-continents__item">
      <img
        class="bk-continents__img"
        src="{{asset('images/' . $continent->image)}}"
        alt="" >
      <p class="bk-continents__info">
        @if(getCurrentLang() === 'ru')
        {{ $continent->name_ru }}
        @elseif(getCurrentLang() === 'en')
        {{ $continent->name_en }}
        @else
        {{ $continent->name_kk }}
        @endif
      </p>
      <div class="bk-continents__crud bk-btn-actions">
        <a
          class="bk-btn-actions__link bk-btn-actions__link--menu btn btn-primary"
          href="{{ route('continents.dishes.show', $continent) }}"
          data-tip="{{ __('main.menu') }}" ></a>
        <a
          class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
          href="{{ route('continents.edit', $continent) }}"
          data-tip="{{ __('main.t_edit') }}" ></a>
        <a
          class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
          href="javascript:void(0)"
          data-id="{{ $continent->id }}"
          data-table-name="continent"
          data-toggle="modal"
          data-target="#bk-delete-modal"
          data-tip="{{ __('main.t_delete') }}" ></a>
      </div>
    </li>
    @endforeach
  </ul>

</section>
@endsection
