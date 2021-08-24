@extends('admin.layouts.master')

@section('title', __('main.halls'))

@section('content')
<section id="hall-index" class="bk-page section info-form">
  <h2 class="mb-3">{{ __('main.halls') }}</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('halls.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('hall-types.index') }}">
      {{ __('main.type_halls') }}
    </a>
  </div>

  <table
    id="hall-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25">{{ __('main.t_name') }}</th>
        <th scope="col" class="w-25">{{ __('main.type') }}</th>
        <th scope="col" class="w-50 no-sort">{{ __('main.t_desc') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($halls as $key => $hall)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $hall->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $hall->name_en }}
          @else
          {{ $hall->name_kk }}
          @endif
        </td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $hall->type_hall->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $hall->type_hall->name_en }}
          @else
          {{ $hall->type_hall->name_kk }}
          @endif
        </td>
        <td>
          <div class="bk-btn-info">
            @if(getCurrentLang() === 'ru')
            {{ $hall->desc_ru }}
            @elseif(getCurrentLang() === 'en')
            {{ $hall->desc_en }}
            @else
            {{ $hall->desc_kk }}
            @endif
            <button
              class="bk-btn-info__triangle bk-btn-info__triangle--down"
              title="{{ __('main.more') }}">
            </button>
          </div>
        </td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('halls.edit', $hall) }}"
              data-tip="{{ __('main.t_edit') }}" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $hall->id }}"
              data-table-name="hall"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="{{ __('main.t_delete') }}" ></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
