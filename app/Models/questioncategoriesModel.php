<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questioncategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'questionCategories';
    protected $fillable = [
        'id_user',
        'name',
    ];
}
