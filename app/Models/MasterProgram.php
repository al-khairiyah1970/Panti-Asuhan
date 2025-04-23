<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProgram extends Model
{
    protected $table = 'master_program';
    protected $fillable = [
        'judul',
        'deskripsi',
        'img',
        'jenis',
        'created_at',
        'updated_at'
    ];
}
