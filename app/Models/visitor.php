<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Visitor extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'uuid',
        'nama',
        'nik',
        'phone',
        'konfirmasi',
    ];

}
