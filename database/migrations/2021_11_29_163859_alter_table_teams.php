<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTeams extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('teams', function (Blueprint $table) {
      $table->string('name_ru')->nullable()->change();
      $table->string('name_kk')->nullable()->change();
      $table->string('name_en')->nullable()->change();
      $table->text('desc_ru')->nullable()->change();
      $table->text('desc_en')->nullable()->change();
      $table->text('desc_kk')->nullable()->change();
      $table->integer('position_id')->nullable()->after('category_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('teams', function (Blueprint $table) {
      $table->string('name_ru')->nullable(false)->change();
      $table->string('name_kk')->nullable(false)->change();
      $table->string('name_en')->nullable(false)->change();
      $table->text('desc_ru')->nullable(false)->change();
      $table->text('desc_en')->nullable(false)->change();
      $table->text('desc_kk')->nullable(false)->change();
      $table->dropColumn('position_id');
    });
  }
}