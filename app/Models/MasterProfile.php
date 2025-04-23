<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProfile extends Model
{
    protected $table = 'master_profile';
    protected $fillable = [
        'isi',
        'img',
        'created_at',
        'updated_at'
    ];
}
