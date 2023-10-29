<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'id_address',
        'id_user',
        'id_specialty',
        'full_name',
        'sex',
        'Qualifications',
    ];
}
