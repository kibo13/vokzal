<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('studios', function (Blueprint $table) {
      $table->id();
      $table->integer('category_id');
      $table->text('intro_ru');
      $table->text('intro_en');
      $table->text('intro_kk');
      $table->text('desc_ru');
      $table->text('desc_en');
      $table->text('desc_kk');
      $table->text('image')->nullable();
      $table->text('note')->nullable();
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
    Schema::dropIfExists('studios');
  }
}