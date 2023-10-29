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
        'hospital_type',
        'status',
        'slug',
    ];
}
