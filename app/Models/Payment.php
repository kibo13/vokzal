<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'date_time',
    'invoice_id',
    'amount',
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
  ];
}