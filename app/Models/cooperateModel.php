<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cooperateModel extends Model
{
    use HasFactory;
    protected $table = 'cooperate';
    protected $fillable = [
        'name',
        'email',
        'sdt',
        'note',
    ];
}
