<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{
    

    // index | List

    // store | Save
    public function store(Request $request){
        // dd($request->all());

        Claim::create([
            'employee_id' => $request->employee_id,
            'claim_date' => $request->claim_date,
            'claim_type' => $request->employee_type,
            'amount' => $request->amount,
            'status' =>'Pending',
        ]);

        return back();
    }



    // create | page create


    // update | update
    public function updated($id){
      $claim = Claim::where('id',$id)->first();
        if(!$claim){
            return abort(404);
        }

        $claim->update([
             'status'=>'Approved',

        ]);

        return back();
    }

    // destroy | delete
    public function destroy($id){
        $claim = Claim::where('id',$id)->first();
        if(!$claim){
            return abort(404);
        }

        $claim->update([
             'status'=>'Decline',

        ]);

        return back();
    }

}
