<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift_and_schedule;
use Illuminate\Support\Facades\DB;
class InvoiceAdd extends Controller
{
  public function index()
  {


       $Shift_and_schedule =DB::select("SELECT * FROM `hr3_shift_and_scheduling` INNER JOIN hr1_applicant on hr1_applicant.applicant_id=hr3_shift_and_scheduling.employee_id");

    return view('content.apps.shift-and-schedule-view', ['Shift_and_schedule' => $Shift_and_schedule]);

  }
}
