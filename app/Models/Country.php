<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'code',
        'name',
        'provinces',
        'districts'
    ];
    

    protected $casts = [
        'provinces' => 'array',
        'districts' => 'array'
    ];
    use HasFactory;
}
