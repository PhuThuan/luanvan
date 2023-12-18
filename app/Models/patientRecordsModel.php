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
    public function address()
    {
        return $this->belongsTo(AddressModel::class, 'id_address');
    }
    public function getFullAddressAttribute()
    {
        $address = $this->address;

        $fullAddress = implode(', ', array_filter([$address['province'], $address['district'], $address['commune'], $address['street_address']]));

        return $fullAddress;
    }
    public function appointmentSchedule()
    {
        return $this->hasOne(appointmentScheduleModel::class, 'id', 'id_patient_records');
    }
}
