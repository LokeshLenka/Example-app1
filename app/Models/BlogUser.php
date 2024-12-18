<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    use HasFactory;

    protected $table = 'blogusers';

    protected $fillable = [
        'user_id',
    ];
}
