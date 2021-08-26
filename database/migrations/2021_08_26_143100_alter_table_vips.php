<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVips extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('vips', function (Blueprint $table) {
      $table->text('desc_ru')->nullable();
      $table->text('desc_en')->nullable();
      $table->text('desc_kk')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('vips', function (Blueprint $table) {
      $table->dropColumn(['desc_ru', 'desc_en', 'desc_kk']);
    });
  }
}