<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $table = 'weather_data';
    protected $fillable = ['city', 'response_json'];
    protected $casts = ['response_json' => 'array'];
}

