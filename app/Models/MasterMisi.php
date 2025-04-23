<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterMisi extends Model
{
    protected $table = 'master_misi';
    protected $fillable = [
        'isi',
        'created_at',
        'updated_at'
    ];
}
