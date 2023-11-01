<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'DRAFT';
    const STATUS_PUBLISED = 'PUBLISED';
    protected $fillable = [
        'title',
        'describe',
        'img',
        'status'
    ];
}
