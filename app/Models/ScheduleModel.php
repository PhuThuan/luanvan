<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    use HasFactory;
    protected $table = 'work_schedules';
    protected $fillable = [
        'id_working_time',
        'id_doctor',
        'status',
    ];
    public function workingTime()
    {
        return $this->belongsTo(WorkkingtimeModel::class, 'id_working_time');
    }
}
