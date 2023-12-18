<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notiNotificationModel extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $fillable = [
        'id_user',
        'name',
        'description',
        'read',
    ];
}
