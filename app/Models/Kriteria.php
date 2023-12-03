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
}
