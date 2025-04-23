<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKepengurusan extends Model
{
    protected $table = 'master_kepengurusan';
    protected $fillable = [
        'judul',
        'deskripsi',
        'img',
        'created_at',
        'updated_at'
    ];
}
