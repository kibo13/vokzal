@extends('admin.layouts.master')

@section('title', __('main.positions'))

@section('content')
<section id="position-index" class="bk-page section info-form">
  <h2 class="mb-3">{{ __('main.positions') }}</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('teams.positions.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('teams.index') }}">
      {{ __('main.back') }}
    </a>
  </div>

  <table
    id="position-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100">{{ __('main.t_name') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($positions as $key => $position)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $position->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $position->name_en }}
          @else
          {{ $position->name_kk }}
          @endif
        </td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('teams.positions.edit', $position) }}"
              data-tip="{{ __('main.t_edit') }}" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $position->id }}"
              data-table-name="position"
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
