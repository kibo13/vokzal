@extends('layouts.master')

@section('title', $title)

@section('background-header', 'custom__screen study__screen')
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
<div class="study__section section">
  <div class="relative-container">
      <div class="absolute__line--block">
          <div class="line-left"></div>
          <div class="line-center"></div>
          <div class="line-right"></div>
      </div>
      <div class="container-md">
          <div class="row g-3 gx-sm-4">
              <div class="col-12 col-sm-6">
                  <div class="study-title mb-4">
                      {{ $title }}
                      <div class="bars__title--line">
                          <div class="center__line"></div>
                      </div>
                  </div>
                  <div class="study-text">
                    @if(getCurrentLang() === 'ru')
                      {!! $studio->intro_ru !!}
                    @elseif(getCurrentLang() === 'en')
                      {!! $studio->intro_en !!}
                    @else
                      {!! $studio->intro_kk !!}
                    @endif
                  </div>
              </div>
              <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
                  <div class="study__image">
                      <img src="{{ asset('images/' . $studio->image) }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container-md">
      <div class="row my-5">
          <div class="col-12">
              <div class="study-text">
                @if(getCurrentLang() === 'ru')
                  {!! $studio->desc_ru !!}
                @elseif(getCurrentLang() === 'en')
                  {!! $studio->desc_en !!}
                @else
                  {!! $studio->desc_kk !!}
                @endif
              </div>
          </div>
      </div>
      <div class="row g-4">
        @foreach (getStudioHalls() as $studioHall)
        <div class="col-12 col-sm-4">
          <div class="study-item">
            <div class="study-image">
              <img src="{{ asset('images/' . $studioHall->image) }}" alt="">
            </div>
            <div class="study-type mt-3">
              @if(getCurrentLang() === 'ru')
                {{ $studioHall->name_ru }}
              @elseif(getCurrentLang() === 'en')
                {{ $studioHall->name_en }}
              @else
                {{ $studioHall->name_kk }}
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>
@endsection

