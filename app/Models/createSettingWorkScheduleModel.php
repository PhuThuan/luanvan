<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class createSettingWorkScheduleModel extends Model
{
    use HasFactory;
    protected $table = 'setting_work_schedule';
    protected $fillable = [
        'id_hospital',
        'start_time',
        'end_time',
    ];
}
