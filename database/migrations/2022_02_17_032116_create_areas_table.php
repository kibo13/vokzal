<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('areas', function (Blueprint $table) {
      $table->id();
      $table->string('name_ru')->nullable();
      $table->string('name_kk')->nullable();
      $table->string('name_en')->nullable();
      $table->double('margin')->nullable();
      $table->tinyInteger('is_active')->default(0);
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
    Schema::dropIfExists('areas');
  }
}
