<?php

use Illuminate\Support\Facades\Route;

// home
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;

// cart
use App\Http\Controllers\CartController;

// payment
use App\Http\Controllers\PaymentController;

// sections
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContinentController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\BarController;
use App\Http\Controllers\Admin\VipController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactController;

// subsections
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\FeatureController;

// menu
use App\Http\Controllers\Admin\AssortmentController;
use App\Http\Controllers\Admin\DishController;

// halls
use App\Http\Controllers\Admin\TypeHallController;
use App\Http\Controllers\Admin\HallController;

// orders
use App\Http\Controllers\Admin\OrderController;

// news
use App\Http\Controllers\Admin\NewsController;

// options
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PositionController;

// profile
use App\Http\Controllers\Admin\UserController;

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' =>
    [
      'localeSessionRedirect',
      'localizationRedirect',
      'localeViewPath'
    ]
  ],
  function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'main'])->name('about');
    Route::get('/continents', [ContinentController::class, 'main'])->name('continents');
    Route::get('/studios', [StudioController::class, 'main'])->name('studios');
    Route::get('/bars', [BarController::class, 'main'])->name('bars');
    Route::get('/vips', [VipController::class, 'main'])->name('vips');
    Route::get('/children', [ChildController::class, 'main'])->name('children');
    Route::get('/deliveries', [DeliveryController::class, 'main'])->name('deliveries');
    Route::get('/deliveries/{id}', [DeliveryController::class, 'menu'])->name('deliveries.menu');
    Route::get('/teams', [TeamController::class, 'main'])->name('teams');
    Route::get('/contacts', [ContactController::class, 'main'])->name('contacts');
    Route::get('/data/assortments', [DataController::class, 'assortments']);

    // cart
    Route::get('carts', [CartController::class, 'main'])->name('carts');
    Route::get('carts/create/{id}', [CartController::class, 'create'])->name('carts.create');
    Route::get('carts/age', [CartController::class, 'age'])->name('carts.age');
    Route::get('carts/add/{dish}', [CartController::class, 'add'])->name('carts.add');
    Route::get('carts/del/{dish}', [CartController::class, 'del'])->name('carts.del');
    Route::get('carts/destroy/{dish}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('carts/step_1/{order}', [CartController::class, 'step_1'])->name('carts.step_1');
    Route::post('carts/step_2/{order}', [CartController::class, 'step_2'])->name('carts.step_2');

    // thanks for order
    Route::get('/payment/{order}', [PaymentController::class, 'thxForOrder']);

    Auth::routes([
      'reset' => false,
      'confirm' => false,
      'verify' => false,
      'register' => false
    ]);

    Route::group([
      'middleware' => 'auth',
      'prefix' => 'admin'
    ], function () {
      // home
      Route::get('/', [HomeController::class, 'admin'])->name('admin.home');
      Route::put('/home/{home}', [HomeController::class, 'update'])->name('admin.update');

      // sections
      Route::resource('/categories', CategoryController::class)->except(['create', 'store', 'show']);
      Route::resource('/about', AboutController::class);
      Route::resource('/continents', ContinentController::class);
      Route::resource('/studios', StudioController::class);
      Route::resource('/bars', BarController::class);
      Route::resource('/vips', VipController::class);
      Route::resource('/children', ChildController::class);
      Route::resource('/deliveries', DeliveryController::class);
      Route::resource('/teams', TeamController::class);
      Route::resource('/contacts', ContactController::class);

      // subsections
      Route::resource('/galleries', GalleryController::class, ['as' => 'bars']);
      Route::resource('/photos', PhotoController::class, ['as' => 'vips']);
      Route::resource('/features', FeatureController::class, ['as' => 'children']);

      // menu
      Route::resource('/positions', PositionController::class, ['as' => 'teams']);
      Route::resource('/assortments', AssortmentController::class, ['as' => 'continents']);
      Route::resource('/dishes', DishController::class, ['as' => 'continents']);
      Route::get('/dishes/{continent}/create', [DishController::class, 'create'])->name('continents.dishes.create');
      Route::delete('/dishes/{continent}/destroy/{dish}', [DishController::class, 'destroy'])->name('continents.dishes.destroy');

      // halls
      Route::resource('/hall-types', TypeHallController::class);
      Route::resource('/halls', HallController::class);

      // orders
      Route::resource('/orders', OrderController::class);

      // news
      Route::resource('/news', NewsController::class);

      // logs
      Route::get('/logs', [PaymentController::class, 'index'])->name('logs.index');
      Route::get('/logs/{log}', [PaymentController::class, 'show'])->name('logs.show');

      // settings
      Route::get('/settings', [OptionController::class, 'allOptions'])->name('settings.index');
      Route::put('/settings/{option}', [OptionController::class, 'update'])->name('settings.update');

      Route::get('/age-limit', [OptionController::class, 'ageLimit'])->name('settings.agelimit');
      Route::get('/thanks', [OptionController::class, 'thanks'])->name('settings.thanks');

      Route::get('/profile', [UserController::class, 'index'])->name('settings.users');
      Route::put('/profile/{user}', [UserController::class, 'update'])->name('settings.users.update');
    });
  }
);

// мультиязычность
Route::get('/{locale}', [HomeController::class, 'changeLocale'])->name('locale');

// получение токена для проведения оплаты
Route::post('/token', [PaymentController::class, 'getTokenForPayment']);

// роуты для получения ответа
Route::post('/success', [PaymentController::class, 'success']);
Route::post('/failure', [PaymentController::class, 'failure']);

// оформление заказа на 3-м шаге
Route::post('carts/step_3/{order}', [CartController::class, 'step_3'])->name('carts.step_3');

// активность блюда на странице
Route::get('/dishes/active/{dish}', [DishController::class, 'is_active'])->name('dishes.active');
