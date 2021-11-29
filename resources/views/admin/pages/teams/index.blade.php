@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<section id="team-index" class="bk-page section info-form">
  <h2 class="mb-3">{{ $title }}</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('teams.create') }}" >
      {{ __('main.create') }}
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('teams.positions.index') }}">
      {{ __('main.positions') }}
    </a>
  </div>

  <table
    id="team-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25">{{ __('main.worker') }}</th>
        <th scope="col" class="w-25">{{ __('main.position') }}</th>
        <th scope="col" class="w-50">{{ __('main.t_desc') }}</th>
        <th scope="col" class="no-sort">{{ __('main.t_action') }}</th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $key => $team)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $team->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $team->name_en }}
          @else
          {{ $team->name_kk }}
          @endif
        </td>
        <td>
          @if(getCurrentLang() === 'ru')
          {{ $team->position->name_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $team->position->name_en }}
          @else
          {{ $team->position->name_kk }}
          @endif
        </td>
        <td>
          <div class="bk-btn-info">
            @if(getCurrentLang() === 'ru')
            {{ $team->desc_ru }}
            @elseif(getCurrentLang() === 'en')
            {{ $team->desc_en }}
            @else
            {{ $team->desc_kk }}
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
              href="{{ route('teams.edit', $team) }}"
              data-tip="{{ __('main.t_edit') }}" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $team->id }}"
              data-table-name="team"
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
