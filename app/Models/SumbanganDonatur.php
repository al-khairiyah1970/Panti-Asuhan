<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterDonatur;
use App\Models\MasterDonasi;

class SumbanganDonatur extends Model
{
    protected $table = 'sumbangan_donatur';
    protected $primaryKey = 'id_sumbangan';
    protected $keyType = 'string';
    protected $fillable = [
        'id_sumbangan',
        'kode_sumbangan',
        'id_user_penyumbang',
        'id_campaign',
        'id_fundraiser',
        'nilai_sumbangan',
        'id_mayar',
        'id_transaction_mayar',
        'payment_link',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(MasterDonatur::class, 'id', 'id_user_penyumbang');
    }

    public function campaign()
    {
        return $this->hasOne(MasterDonasi::class, 'id', 'id_campaign');
    }
}
