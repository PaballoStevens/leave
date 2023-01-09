<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leavetype extends Model
{
    protected $fillable = [
        'leavetype',
        'description',
        'date_from',
        'date_to'
    ];
}
