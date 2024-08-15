<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $total_patients = DB::select("SELECT IFNULL(COUNT(id),0) AS totalPatient FROM  opertation_lists");

        $total_waiting_patients = DB::select("SELECT IFNULL(COUNT(id),0) AS totalWaitingPatient FROM  opertation_lists
        WHERE status = 'Awaiting' ");

        $total_sucessfull_patients = DB::select("SELECT IFNULL(COUNT(id),0) AS totalSucessfullPatient FROM  opertation_lists 
        WHERE status = 'Surgery Done' ");

        $total_other_patients = DB::select("SELECT IFNULL(COUNT(id), 0) AS totalOtherPatient FROM opertation_lists 
        WHERE status NOT IN ('Surgery Done', 'Awaiting')");

        $pie_charts = DB::select("SELECT status, IFNULL(COUNT(id), 0) AS totalPatients FROM opertation_lists 
        GROUP BY status");

        return view('pages.index')
            ->with('total_patients', $total_patients)
            ->with('total_waiting_patients', $total_waiting_patients)
            ->with('total_sucessfull_patients', $total_sucessfull_patients)
            ->with('total_other_patients', $total_other_patients)
            ->with('pie_charts', $pie_charts);
    }
}
