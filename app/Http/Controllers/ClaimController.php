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
        ]);

        return back();
    }



    // create | page create


    // update | update
    public function update(Request $request){
        $id=$request->claim_id_update;
        $claim = Claim::where('id',$id)->first();
        if(!$claim){
            return abort(404);
        }

        $claim->update([
            'employee_id' => $request->employee_id_update,
            'claim_date' => $request->claim_date_update,
            'claim_type' => $request->employee_type_update,
            'amount' => $request->amount_update,
        ]);

        return back();
    }


    // destroy | delete
    public function destroy($id){
        $claim = Claim::find($id);

        if(!$claim){
            return abort(404);
        }


        $claim->delete();


        return back();
    }

}
