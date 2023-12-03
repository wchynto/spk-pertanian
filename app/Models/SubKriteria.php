<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_subkriteria';

    protected $keyType = 'string';

    public $incrementing = false;
}
