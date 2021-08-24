<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableChildren extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('children', function (Blueprint $table) {
      $table->text('note_ru')->nullable();
      $table->text('note_kk')->nullable();
      $table->text('note_en')->nullable();
      $table->text('tip_ru')->nullable();
      $table->text('tip_kk')->nullable();
      $table->text('tip_en')->nullable();
      $table->text('image')->nullable();
      $table->text('note')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('children', function (Blueprint $table) {
      $table->dropColumn(
        [
          'note_ru',
          'note_en',
          'note_kk',
          'tip_ru',
          'tip_en',
          'tip_kk',
          'image',
          'note'
        ]
      );
    });
  }
}