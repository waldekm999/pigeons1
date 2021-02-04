<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pigeon extends Model
{
    use HasFactory;

    protected $fillable = [
        'ring', 'name', 'gender', 'birth_year',
        'race', ' colour', 'status'
    ];
}
