<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'uuid',
        'nama',
        'sippmi',
        'alamat',
        'telp_kantor',
        'telp_kantor2',
        'surel',
    ];
}
