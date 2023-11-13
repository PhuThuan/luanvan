<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitalModel extends Model
{
    use HasFactory;
    protected $table = 'hospital';
    protected $fillable = [
        'id_address',
        'name',
        'logo',
        'introduce',
        'hospital_type',
        'status',
        'slug',
    ];
}
