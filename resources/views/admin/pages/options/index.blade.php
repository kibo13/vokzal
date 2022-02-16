@extends('admin.layouts.master')

@section('title', __('main.config'))

@section('content')
<section id="config-index" class="section">
  <h2 class="mb-3"> {{ __('main.config') }}</h2>

  <div class="options">
    <div class="options-card">
      <h5 class="options-title">Профиль</h5>
      <hr>
      <p>
        Изменить логин, пароль или электронную почту
      </p>
      <a class="btn btn-primary" href="{{ route('settings.users') }}">
        {{ __('main.go_to') }}
      </a>
    </div>
    <div class="options-card">
      <h5 class="options-title">Возрастное ограничение</h5>
      <hr>
      <p>
        Изменить текстовое содержимое модального окна
        при выборе алкогольных напитков клиентами сайта
      </p>
      <a class="btn btn-primary" href="{{ route('settings.agelimit') }}">
        {{ __('main.go_to') }}
      </a>
    </div>
    <div class="options-card">
      <h5 class="options-title">Сообщение после оплаты</h5>
      <hr>
      <p>
        Изменить текстовое содержимое страницы, на которую клиенты попадают после оплаты заказа
      </p>
      <a class="btn btn-primary" href="{{ route('settings.thanks') }}">
        {{ __('main.go_to') }}
      </a>
    </div>
  </div>
</section>
@endsection
