<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newcategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'NewsCategories';
    protected $fillable = [
        'id_user',
        'name',
    ];
}

