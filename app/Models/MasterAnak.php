<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAnak extends Model
{
    protected $table = 'master_anak';
    protected $fillable = [
        'nama',
        'usia',
        'asal_daerah',
        'pendidikan',
        'prestasi',
        'cita_cita',
        'created_at',
        'updated_at',
    ];
}
