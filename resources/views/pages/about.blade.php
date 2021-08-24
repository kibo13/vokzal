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
    <div class="container-md">
      <div class="row g-3 gx-sm-4">
        <div class="col-12">
          <div class="study-title mb-4">
            {{ $title }}
            <div class="bars__title--line">
                <div class="center__line"></div>
            </div>
          </div>
          <div class="study-text">
            @if(getCurrentLang() === 'ru')
              {!! $about->desc_ru !!}
            @elseif(getCurrentLang() === 'en')
              {!! $about->desc_en !!}
            @else
              {!! $about->desc_kk !!}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

