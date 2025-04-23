<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterDonatur extends Model
{
    protected $table = 'master_donatur';
    protected $fillable = [
        'id_donasi',
        'nama_depan',
        'nama_belakang',
        'email',
        'telepon',
        'nominal',
        'created_at',
        'updated_at'
    ];
}
