<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;
    protected $table = 'tindakan';
    protected $fillable = [
        'dokumen',
        'dokumentasi',
        'dokumentasi',
        'user_id',
        'laporan_id',
    ];
}
