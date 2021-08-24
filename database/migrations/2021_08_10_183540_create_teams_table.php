<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('teams', function (Blueprint $table) {
      $table->id();
      $table->integer('category_id');
      $table->string('name_ru');
      $table->string('name_kk');
      $table->string('name_en');
      $table->text('desc_ru');
      $table->text('desc_kk');
      $table->text('desc_en');
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
    Schema::dropIfExists('teams');
  }
}