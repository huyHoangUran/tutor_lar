<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    protected $fillable = [
        'company_name',
        'account_owner',
        'img',
        'project',
        'invoice',
        'tag',
        'category',
        'status',
    ];
}
