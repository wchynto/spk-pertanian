<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatifDesa extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_alternatif_desa';

    protected $keyType = 'string';

    public $incrementing = false;
}
