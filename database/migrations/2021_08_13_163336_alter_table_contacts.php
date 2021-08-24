<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableContacts extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('contacts', function (Blueprint $table) {
      $table->string('name_ru')->nullable();
      $table->string('name_en')->nullable();
      $table->string('name_kk')->nullable();
      $table->string('site');
      $table->string('adm_phone')->nullable();
      $table->string('ds_phone')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('contacts', function (Blueprint $table) {
      $table->dropColumn(
        [
          'name_ru',
          'name_en',
          'name_kk',
          'site',
          'adm_phone',
          'ds_phone'
        ]
      );
    });
  }
}
