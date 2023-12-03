<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifDesa extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_alernatif_desa';

    protected $keyType = 'string';

    public $incrementing = false;
}
