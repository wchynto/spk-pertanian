<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    protected $table = 'subkriterias';

    protected $primaryKey = 'kode_subkriteria';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'kode_subkriteria',
        'keterangan',
        'nilai',
        'kode_kriteria'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
