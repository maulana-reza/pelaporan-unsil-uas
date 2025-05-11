<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ParagonIE\CipherSweet\BlindIndex;
use ParagonIE\CipherSweet\Constants;
use ParagonIE\CipherSweet\EncryptedRow;
use Spatie\LaravelCipherSweet\Concerns\UsesCipherSweet;
use Spatie\LaravelCipherSweet\Contracts\CipherSweetEncrypted;

class Laporan extends Model implements CipherSweetEncrypted
{
    use HasFactory;
    use UsesCipherSweet;

    protected $table = 'laporan';
    protected $fillable = [
        'no_laporan',
        'bukti',
        'label',
        'deskripsi',
        'klasifikasi_id',
        'user_id',
        'email'
    ];

    public static function configureCipherSweet(EncryptedRow $encryptedRow): void
    {
        $encryptedRow->addField('no_laporan')
            ->addBlindIndex('no_laporan', new BlindIndex('no_laporan_index', []))
            ->addField('label')
            ->addBlindIndex('label', new BlindIndex('label_index', []))
            ->addField('deskripsi');
    }

    public static function generateNoLaporan($klasifikasi)
    {
        $counter = optional(self::latest('id')->first())->no_laporan
            ? (int)explode('/', self::latest('id')->first()->no_laporan)[1] + 1
            : 1;
        $prefix = collect(explode(' ', $klasifikasi->nama))
            ->map(fn($word) => strtoupper($word[0]))
            ->join('');
        return sprintf('%s/%04d', strtoupper($prefix), $counter);
    }
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'klasifikasi_id', 'id');

    }
}
