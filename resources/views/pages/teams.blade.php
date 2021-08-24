@extends('layouts.master')

@section('title', $title)

@section('background-header', 'custom__screen team__screen')
@section('background-content', '')
@section('background-footer', 'custom__footer footer-bg__padding')

@section('section-title')
<div class="custom__screen--title">
  <div class="container-md">
      <div class="custom__screen--title-inner">
          <div class="main__section--title big__title">
            {{ $title }}
          </div>
      </div>
  </div>
</div>
@endsection

@section('section-content')
<div class="team__section section">
  <div class="container-md">
    <div class="row gx-2 gy-4 g-sm-3 g-lg-5">
      @foreach ($teams as $team)
      <div class="col-12 col-sm-4">
        <div class="team__item d-flex flex-column">
          <div class="team__image">
            <img src="{{ asset('images/' . $team->image) }}" alt="">
          </div>
          <div class="team-title">
            @if(getCurrentLang() === 'ru')
            {{ $team->name_ru }}
            @elseif(getCurrentLang() === 'en')
            {{ $team->name_en }}
            @else
            {{ $team->name_kk }}
            @endif
          </div>
          <div class="team-prof">
            {{ __('main.t_chef') }}
          </div>
          <div class="team-desc">
            @if(getCurrentLang() === 'ru')
            {{ $team->desc_ru }}
            @elseif(getCurrentLang() === 'en')
            {{ $team->desc_en }}
            @else
            {{ $team->desc_kk }}
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

