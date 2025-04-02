<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qrcode;
use Illuminate\Support\Facades\DB;
class qrcodeController extends Controller
{
          public function index()
  {

    $qrcode =DB::select("SELECT * FROM `hr3_qrcode_attendance` inner  join  hr1_applicant on  hr1_applicant.applicant_id=hr3_qrcode_attendance.employee_id  inner join hr4_recruitment on  hr4_recruitment.recruitment_id=hr3_qrcode_attendance.recruitment_id");
      return view('content.apps.employee-view',compact('qrcode'));
  }

      public function store(Request $request){
        // dd($request->all());

        qrcode::create([
            'employee_id' => $request->empids,
            'recruitment_id' => $request->rec_id,
             'generate_code' => $request->generatedCodes,
        ]);

        return back();
    }

}
