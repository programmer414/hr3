<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class timeandattendance extends Controller
{
        public function index()
  {

      $attendance = DB::select("select * from `hr3_attendance` left join `hr3_qrcode_attendance` on `hr3_qrcode_attendance`.`employee_id` = hr3_attendance.employee_id inner join hr1_applicant on hr1_applicant.applicant_id=hr3_qrcode_attendance.employee_id");
      return view('content.timeandattendance.time-and-attendance',['attendance' => $attendance]);
  }


}


?>