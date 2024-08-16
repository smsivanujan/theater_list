<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $surgeryDate = $request->input('surgery_date');
        $consultant = $request->input('consultant');

        $operationList = DB::table('opertation_lists')
            ->select(
                'opertation_lists.id',
                'opertation_lists.category',
                'opertation_lists.surgery_date',
                'opertation_lists.diagnosis',
                'opertation_lists.status',
                'surgery_types.id AS surgery_id',
                'surgery_types.surgery_name',
                'patientdemographic.patientID',
                'patientdemographic.patientPersonalTitle',
                'patientdemographic.patientName',
                'patientdemographic.patientDateofbirth',
                'patientdemographic.patientSex',
                'department.departmentTitle AS ward',
                'admission.BHTClinicFileNo'
            )
            ->join('surgery_types', 'opertation_lists.surgery_id', 'surgery_types.id')
            ->join('patientdemographic', 'opertation_lists.patient_id', 'patientdemographic.patientID')
            ->join('admission', 'patientdemographic.patientID', 'admission.patientID')
            ->join('department', 'admission.departmentCode', 'department.departmentCode')
            ->get();

        
            // Calculate age
        foreach ($operationList as $operation) {
            $operation->age = Carbon::parse($operation->patientDateofbirth)->age; // Correct field name here
        }

        return view('pages.reportPrint', compact('operationList'));
    }
}
