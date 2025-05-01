<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Crm extends Controller
{
  public function index()
  {

// Define months array at the top
$months = [
    1 => "January", 2 => "February", 3 => "March", 4 => "April",
    5 => "May", 6 => "June", 7 => "July", 8 => "August",
    9 => "September", 10 => "October", 11 => "November", 12 => "December"
];

// Fetch monthly reports for Approved claims
$monthlyReports = DB::table('claims')
    ->select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as total_claims')
    )
    ->where('status', 'Approved')
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->get()
    ->keyBy('month')
    ->toArray();

// Fill missing months with zero claims
$formattedData = [];
foreach ($months as $num => $name) {
    $formattedData[] = [
        'month' => $name,
        'total_claims' => isset($monthlyReports[$num]) ? $monthlyReports[$num]->total_claims : 0
    ];
}



    return view('content.dashboard.dashboards-crm',compact('formattedData'));




  }
}
