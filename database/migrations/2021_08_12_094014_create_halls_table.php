<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('halls', function (Blueprint $table) {
      $table->id();
      $table->integer('type_hall_id');
      $table->string('name_ru');
      $table->string('name_kk');
      $table->string('name_en');
      $table->text('desc_ru')->nullable();
      $table->text('desc_kk')->nullable();
      $table->text('desc_en')->nullable();
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
    Schema::dropIfExists('halls');
  }
}
