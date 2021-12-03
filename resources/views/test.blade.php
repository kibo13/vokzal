@extends('layouts.master')

@section('title', 'test')

@section('background-header', 'cart__screen')
@section('background-content', 'is_cart')
@section('background-footer', 'custom__footer')

@section('section-content')
<div class="container">
  <ol style="display: flex; flex-direction: column; grid-gap: 10px;">
    @foreach ($response as $res)
    <li >
      {{ $res }}
    </li>
    @endforeach
  </ol>
</div>
@endsection
