<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    use HasFactory;
    const STATUS_HIDE = 'hide';
    const STATUS_SHOW = 'show';
    protected $fillable = [
        'img',
        'name',
        'status',
        'price'
    ];
}
