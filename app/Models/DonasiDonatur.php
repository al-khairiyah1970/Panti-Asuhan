<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiDonatur extends Model
{
    protected $table = 'donasi_donatur';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'kode_donasi',
        'id_donasi',
        'id_donatur',
        'nilai_donasi',
        'payment_link',
        'status',
        'created_at',
        'updated_at'
    ];
}
