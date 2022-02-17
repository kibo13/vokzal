<?php

return [
  // slug
  'slug' => [
    'about'         => 'about',
    'continents'    => 'continents',
    'studios'       => 'studios',
    'bars'          => 'bars',
    'vips'          => 'vips',
    'children'      => 'children',
    'deliveries'    => 'deliveries',
    'teams'         => 'teams',
    'contacts'      => 'contacts',
  ],

  // options
  'options' => [
    [
      'name'        => 'Профиль',
      'desc'        => 'Настройка логина, пароль и электронный почты',
      'href'        => 'users',
    ],
    [
      'name'        => 'Районы доставки',
      'desc'        => 'Настройка районов доставки',
      'href'        => 'areas.index',
    ],
    [
      'name'        => 'Возрастное ограничение',
      'desc'        => 'Настройка текста в окне при заказе спиртных напитков',
      'href'        => 'agelimit',
    ],
    [
      'name'        => 'Сообщение после оплаты',
      'desc'        => 'Настройка текста в окне, которое всплывает после оформления заказа',
      'href'        => 'thanks',
    ],
  ]
];
