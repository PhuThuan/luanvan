<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsModel extends Model
{
    use HasFactory;

    protected $table = 'News';
    protected $fillable = [
        'id_newsCategories',
        'title',
        'content',
        'image_url',
        'published_at',
        'author',
        'category',
    ];
}
