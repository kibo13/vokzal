<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePayments extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('payments', function (Blueprint $table) {
      $table->string('currency')->after('amount');
      $table->string('terminal')->after('currency');
      $table->string('account_id')->nullable()->after('terminal');
      $table->string('description')->nullable()->after('account_id');
      $table->string('email')->nullable()->after('description');
      $table->string('phone')->nullable()->after('email');
      $table->string('ip_address')->nullable()->after('phone');
      $table->string('ip_country')->nullable()->after('ip_address');
      $table->string('ip_city')->nullable()->after('ip_country');
      $table->string('ip_region')->nullable()->after('ip_city');
      $table->string('ip_district')->nullable()->after('ip_region');
      $table->string('card_id')->nullable()->after('ip_district');
      $table->string('status')->after('card_id');
      $table->string('reason')->after('status');
      $table->integer('reason_code')->after('reason');
      $table->string('date_time')->after('reason_code');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('payments', function (Blueprint $table) {
      $table->dropColumn([
        'currency',
        'terminal',
        'account_id',
        'description',
        'email',
        'phone',
        'ip_address',
        'ip_country',
        'ip_city',
        'ip_region',
        'ip_district',
        'card_id',
        'status',
        'reason',
        'reason_code',
        'date_time'
      ]);
    });
  }
}