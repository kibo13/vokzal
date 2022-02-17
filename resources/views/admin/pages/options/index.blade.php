@extends('admin.layouts.master')

@section('title', __('main.config'))

@section('content')
<section id="config-index" class="section">
  <h2 class="mb-3"> {{ __('main.config') }}</h2>
  <div class="options">
    @foreach ($options as $option)
    <div class="options-card" style="user-select: none;">
      <h5 class="options-title">{{ $option['name'] }}</h5>
      <hr>
      <p>{{ $option['desc'] }}</p>
      <a class="btn btn-primary" href="{{ route('settings.' . $option['href']) }}">
        {{ __('main.go_to') }}
      </a>
    </div>
    @endforeach
  </div>
</section>
@endsection
