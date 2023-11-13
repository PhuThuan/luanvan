<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'appointmentschedule';
    protected $fillable = [
        'id_patient_records',
        'name',
        'age',
        'gender',
        'doctor',
        'specialty',
        'address',
        'hospital',
        'start_time',
        'end_time',
        'day',
        'status',
    ];
}
