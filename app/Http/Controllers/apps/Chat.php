<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chat extends Controller
{


      public function index()
  {

      $timesheet = DB::select("SELECT * FROM `hr3_attendance` inner  join  hr1_applicant on  hr1_applicant.applicant_id=hr3_attendance.employee_id");
      return view('content.apps.timesheet-management-view',['timesheet' => $timesheet]);
  }

}
