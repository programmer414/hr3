<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chat extends Controller
{


      public function index()
  {

      $timesheet = DB::table('hr3_attendance')
            ->leftJoin('hr1_employee_info', 'hr1_employee_info.employee_id', '=', 'hr3_attendance.employee_id')
            ->get();
      return view('content.apps.app-chat',['timesheet' => $timesheet]);
  }

}
