<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->date('date_in')->nullable();
      $table->time('time_in')->nullable();
      $table->tinyInteger('status')->default(0);

      $table->tinyInteger('step')->default(1);
      // step #1
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('phone')->nullable();

      // step #2
      $table->string('city')->nullable();
      $table->string('street')->nullable();
      $table->string('dom')->nullable();
      $table->string('corp')->nullable();
      $table->string('flat')->nullable();

      // step #3
      $table->tinyInteger('pay')->nullable();
      $table->double('total')->default(0);
      $table->tinyInteger('check')->default(0);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}