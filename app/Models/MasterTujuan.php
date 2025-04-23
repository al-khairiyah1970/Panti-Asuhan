<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterTujuan extends Model
{
    protected $table = 'master_tujuan';
    protected $fillable = [
        'isi',
        'created_at',
        'updated_at'
    ];
}
