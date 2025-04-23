<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterDonasi extends Model
{
    protected $table = 'master_donasi';
    protected $fillable = [
        'nama_donasi',
        'deskripsi_donasi',
        'target_donasi',
        'terkumpul_donasi',
        'kekurangan_donasi',
        'deadline_donasi',
        'img_donasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
