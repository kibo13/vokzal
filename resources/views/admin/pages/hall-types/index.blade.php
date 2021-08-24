@extends('admin.layouts.master')

@section('title', __('main.type_halls'))

@section('content')
<section id="hall-index" class="bk-page section">
  <h2 class="mb-3">{{ __('main.type_halls') }}</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('hall-types.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('halls.index') }}">
      {{ __('main.halls') }}
    </a>
  </div>

  <table
    id="hall-type-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100">{{ __('main.t_name') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($hall_types as $key => $ht)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $ht->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $ht->name_en }}
          @else
          {{ $ht->name_kk }}
          @endif
        </td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('hall-types.edit', $ht) }}"
              data-tip="{{ __('main.t_edit') }}" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $ht->id }}"
              data-table-name="hall-type"
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
