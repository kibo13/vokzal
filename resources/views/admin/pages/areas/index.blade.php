@extends('admin.layouts.master')

@section('title', __('main.areas'))

@section('content')
<section id="area-index" class="bk-page section info-form">
  <h2 class="mb-3">{{ __('main.areas') }}</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('settings.areas.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('settings.index') }}">
      {{ __('main.back') }}
    </a>
  </div>

  <table
    id="area-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50" style="min-width: 200px;">{{ __('main.area') }}</th>
        <th scope="col" class="w-25" style="min-width: 150px;">{{ __('main.delivery') }}</th>
        <th scope="col" class="w-25 no-sort text-center" style="min-width: 100px;">{{ __('main.active') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($areas as $key => $area)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $area->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $area->name_en }}
          @else
          {{ $area->name_kk }}
          @endif
        </td>
        <td>
          @if($area->is_active == 1)
          {{ number_format($area->margin, 2, ',', ' ') }} тг
          @else
          <span class="text-danger">СТОП доставка</span>
          @endif
        </td>
        <td>
          <form class="d-flex justify-content-center" action="{{ route('settings.areas.show', $area) }}" method="GET">
            @csrf
            <input type="hidden" name="is_active" value="0">
            <input
                class="form-control is_active"
                style="cursor: pointer; width: 30px; height: 30px;"
                id="is_active"
                type="checkbox"
                name="is_active"
                data-area="{{ $area->id }}"
                value="1"
                @if($area->is_active) checked @endif />
          </form>
        </td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('settings.areas.edit', $area) }}"
              data-tip="{{ __('main.t_edit') }}" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $area->id }}"
              data-table-name="area"
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
