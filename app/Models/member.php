<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Member extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'uuid',
        'nama',
        'company_id',
        'no_hp',
        'photo',
        'kehadiran',
        'absensi',
       
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}