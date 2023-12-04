<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifDesa extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_alternatif_desa';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'kode_alternatif_desa',
        'nama_desa',
        'hasil_perhitungan',
        'luas_tanah',
        'kode_kecamatan'
    ];
}
