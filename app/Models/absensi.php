<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use Uuid;
    protected $fillable = [
        'uuid',
        'nama',
        'member_id',
        'kehadiran',
        'absensi',
        'komisi',
        'confirm_by',
        'komisi_confirm',
    ];
}
