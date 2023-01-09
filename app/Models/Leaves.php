<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $fillable = [
        'Leavetype',
        'ToDate',
        'FromDate',
        'Description',
        'AdminRemark',
        'AdminRemarkDate',
        'Status',
        'empid',
        'num_days',
    ];
}
