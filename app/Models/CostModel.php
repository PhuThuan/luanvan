<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostModel extends Model
{
    use HasFactory;
    protected $table = 'cost';
    protected $fillable = [
      'id_hospital',
       'day',
      'cost',
    ];
}
