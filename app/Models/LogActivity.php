<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $fillable = [
        'subject', 'member_id', 'company_id', 'member_status', 'confirm_at', 'user_id'
    ];
}
