<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDishes extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('dishes', function (Blueprint $table) {
      $table->tinyInteger('is_active')->default(0)->after('price');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('dishes', function (Blueprint $table) {

      $table->dropColumn('is_active');
    });
  }
}