<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_kecamatan';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'kode_kecamatan',
        'nama_kecamatan',
        'alamat_kecamatan'
    ];

    public function kecamatan()
    {
        return $this->hasMany(AlternatifDesa::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
