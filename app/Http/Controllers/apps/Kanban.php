<?php

namespace App\Http\Controllers\apps;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
class Kanban extends Controller
{
  public function index()
  {

$Leaves=DB::select(" SELECT *,CONCAT(firstname,' ',lastname) as  fname,hr3_leave_management.status as st FROM `hr3_leave_management`INNER JOIN  hr1_applicant
on hr1_applicant.applicant_id=hr3_leave_management.employee_id");


    return view('content.apps.leave-view', ['Leaves' => $Leaves]);

  }
}
