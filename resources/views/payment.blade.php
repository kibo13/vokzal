@extends('layouts.master')

@section('title', 'test')

@section('background-header', 'cart__screen')
@section('background-content', 'is_cart')
@section('background-footer', 'custom__footer')

@section('section-content')
<div class="container">
  {{ $response }}
</div>
@endsection
