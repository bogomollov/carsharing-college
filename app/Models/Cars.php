<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'prod',
        'mark',
        'model',
        'year'
    ];
}
