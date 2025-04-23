<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBanner extends Model
{
    protected $table = 'master_banner';
    protected $fillable = [
        'judul',
        'deskripsi',
        'img',
        'created_at',
        'updated_at',
    ];
}
