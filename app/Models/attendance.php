<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

     protected $table="hr3_attendance";

    use HasFactory;
      protected $fillable = [
          'attendance_id',
        'employee_id',
        'time_in',
        'time_out',
        'total_hrs',
         'over_time',
        
    ];
}
