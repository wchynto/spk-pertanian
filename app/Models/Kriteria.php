<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_kriteria';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot_nilai',
        'jenis_kriteria'
    ];

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
