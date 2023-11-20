<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    const STATUS_ABSENT = 'absent';
    const STATUS_PRESENT = 'present';
    protected $fillable = [
        'class_name',
        'code',
        'name',
        'img',
        'status',
        'note'
    ];
}
