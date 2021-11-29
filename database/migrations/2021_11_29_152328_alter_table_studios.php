<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableStudios extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('studios', function (Blueprint $table) {
      $table->text('desc_ru')->nullable()->change();
      $table->text('desc_en')->nullable()->change();
      $table->text('desc_kk')->nullable()->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('studios', function (Blueprint $table) {
      $table->text('desc_ru')->nullable(false)->change();
      $table->text('desc_en')->nullable(false)->change();
      $table->text('desc_kk')->nullable(false)->change();
    });
  }
}