<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use Illuminate\Support\Facades\DB;

class Calendar extends Controller
{
  public function index(Request $request)
  {

    $claims =DB::select("SELECT * FROM `claims` INNER JOIN hr1_applicant on hr1_applicant.applicant_id=claims.employee_id");

    return view('content.apps.app-calendar', ['claims' => $claims]);
    // return view('content.apps.app-calendar', compact('claims'));
  }
}
