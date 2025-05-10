<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $table = 'klasifikasi';
    protected $fillable = [
        'nama',
        'parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Klasifikasi::class, 'parent_id');
    }
}
