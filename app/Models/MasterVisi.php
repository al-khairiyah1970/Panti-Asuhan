<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterVisi extends Model
{
    protected $table = 'master_visi';
    protected $fillable = [
        'isi',
        'created_at',
        'updated_at'
    ];
}
