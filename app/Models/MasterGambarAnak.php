<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterGambarAnak extends Model
{
    protected $table = 'master_gambar_anak';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
