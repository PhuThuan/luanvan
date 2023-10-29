<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkkingtimeModel extends Model
{
    use HasFactory;
    protected $table = 'workingTimes';
    protected $fillable = [
        'start_time',
        'end_time',
        'Day',
    ];
    public function schedule()
    {
        return $this->hasMany(ScheduleModel::class, 'id_working_time');
    }
}
