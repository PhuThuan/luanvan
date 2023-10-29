<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientRecordsModel extends Model
{
    use HasFactory;
    protected $table = 'patientRecords';
    protected $fillable = [

        'id_user',
        'id_address',
        'name',
        'date_of_birth',
        'phone',
        'gender',
        'job',
        'CCCD',
        'email',
        'ethnic',
        'status',
    ];
}
