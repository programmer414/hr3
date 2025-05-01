<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use DateTime;
use DateTimeZone;

class Leavecontroller extends Controller
{
    

    public function store(Request $request){
        // dd($request->all());
$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
  $Date=$date->format('Y-m-d h:i:s');

        Leave::create([
            'employee_id' => $request->getsecondid,
             'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' =>'Pending',
             'date_request'=>$Date,
        ]);

         return back();
     }


    
public function Leaveupdate($id){
 $leave = Leave::where('id',$id)->first();
        if(!$leave){
             }
        $leave->update([
            'status' =>'Approved',
   
        ]);
    return back();
    }

    public function destroy($id){
       $leave = Leave::where('id',$id)->first();
        if(!$leave){
             }
        $leave->update([
            'status' =>'Decline',
   
        ]);
    return back();
    }


}
