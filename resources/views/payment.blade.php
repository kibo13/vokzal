@extends('layouts.master')

@section('title', 'test')

@section('background-header', 'cart__screen')
@section('background-content', 'is_cart')
@section('background-footer', 'custom__footer')

@section('section-content')
<div class="container">
  {{ $payment }}
  <input type="text" style="border: 1px dashed red; display: flex; width: 100%">
  <input type="text" style="border: 1px dashed red; display: flex; width: 100%">
</div>
@endsection
