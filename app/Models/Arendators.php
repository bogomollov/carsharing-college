<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Arendators extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'history_operations',
        'history_arends',
        'money',
        'status'
    ];
}
