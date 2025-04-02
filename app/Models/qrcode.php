<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qrcode extends Model
{
    use HasFactory;
    protected $table="hr3_qrcode_attendance";

    use HasFactory;
      protected $fillable = [
        'employee_id',
        'recruitment_id',
        'status',
        'generate_code',        
    ];
}
