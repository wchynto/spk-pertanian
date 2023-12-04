<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatifDesa extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_nilai_alternatif_desa';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'kode_nilai_alternatif_desa',
        'kode_alternatif_desa',
        'kode_subkriteria',
        'nilai_c1',
        'nilai_c2',
        'nilai_c3',
        'nilai_c4',
        'nilai_c5',
    ];

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class, 'kode_subkriteria', 'kode_subkriteria');
    }

    public function alternatifDesa()
    {
        return $this->belongsTo(AlternatifDesa::class, 'kode_alternatif_desa', 'kode_alternatif_desa');
    }
}
