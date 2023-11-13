<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnsofusemodel extends Model
{
    use HasFactory;
    protected $table = 'turnsofuse';
    protected $fillable = [
        'turnsofuse',
        'visit',
        'day',
    ];
}
