<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangTerkait extends Model
{
    use HasFactory;
    protected $table = 'bidang_terkait';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
