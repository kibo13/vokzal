<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->integer('category_id');
      $table->text('desc_ru');
      $table->text('desc_en');
      $table->text('desc_kk');
      $table->string('address_ru');
      $table->string('address_en');
      $table->string('address_kk');
      $table->string('phone');
      $table->string('email');
      $table->integer('day_from');
      $table->integer('day_to');
      $table->time('time_from');
      $table->time('time_to');
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
    Schema::dropIfExists('contacts');
  }
}
