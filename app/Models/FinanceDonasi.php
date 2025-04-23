<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceDonasi extends Model
{
    protected $table = 'finance_donasi';
    protected $primaryKey = 'transaction_id';
    protected $keyType = 'string';
    protected $fillable = [
        'transaction_id',
        'order_id',
        'transaction_time',
        'paid_at',
        'transaction_status',
        'transaction_type',
        'status_code',
        'signature_key',
        'settlement_time',
        'permata_va_number',
        'va_number',
        'payment_type',
        'masked_card',
        'fraud_status',
        'currency',
        'acquirer',
        'channel_response_message',
        'channel_response_code',
        'card_type',
        'bank',
        'eci',
        'biller_code',
        'bill_key',
        'approval_code',
        'status_message',
        'amount',
        'gross_amount',
        'payment_status',
        'merchant_id',
        'issuer',
        'expiry_time',
        'three_ds_version',
        'created_at',
        'updated_at',
    ];
}
