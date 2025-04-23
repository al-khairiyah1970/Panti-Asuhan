<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceDonatur extends Model
{
    protected $table = 'finance_donatur';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'event_name',
        'status',
        'created_at',
        'updated_at',
        'merchant_id',
        'merchant_name',
        'merchant_email',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'amount',
        'is_admin_fee_borne_by_customer',
        'is_channel_fee_borne_by_customer',
        'product_id',
        'product_name',
        'product_type',
        'custom_field_name',
        'custom_field_description',
        'custom_field_type',
        'custom_field_is_required',
        'custom_field_key',
        'custom_field_value',
    ];
}
