<?php

namespace App\Http\Controllers;

use App\Models\OpertationList;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpertationListController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
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

        $surgeries = DB::table('surgery_types')
            ->select('id', 'surgery_name')
            ->orderBy('surgery_name')
            ->get();

        return view('pages.operationList', compact('surgeries', 'operationList'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search-term');

        $patients = DB::table('patientdemographic')
            ->select(
                'patientdemographic.patientID',
                'patientdemographic.patientPersonalTitle',
                'patientdemographic.patientName',
                'patientdemographic.patientSex',
                'patientdemographic.patientDateofbirth',
                'department.departmentTitle AS ward',
                'admission.BHTClinicFileNo'
            )
            ->join('admission', 'patientdemographic.patientID', '=', 'admission.patientID')
            ->join('department', 'admission.departmentCode', '=', 'department.departmentCode')
            ->where('admission.BHTClinicFileNo', function ($query) use ($searchTerm) {
                $query->select('admission.BHTClinicFileNo')
                    ->from('admission')
                    ->where('admission.patientID', DB::raw('patientdemographic.patientID'))
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('patientdemographic.patientID', $searchTerm)
                            ->orWhere('patientdemographic.patientNIC', $searchTerm)
                            ->orWhere('patientdemographic.patientPassport', $searchTerm)
                            ->orWhere('patientdemographic.patientContactLand01', $searchTerm)
                            ->orWhere('patientdemographic.patientContactLand02', $searchTerm)
                            ->orWhere('patientdemographic.patientContactMobile01', $searchTerm)
                            ->orWhere('patientdemographic.patientContactMobile02', $searchTerm);
                    })
                    ->orderBy('admission.insertedOn', 'desc')
                    ->limit(1);
            })
            ->get();


        if ($patients->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }

        return response()->json($patients->first());
    }

    public function save(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create

            // $this->validate($request, [
            //     'ctu_number' => 'unique:opertation_lists,ctu_number'
            // ]);
            $opertationList = new OpertationList();
        } else { // update
            // $this->validate($request, [
            //     'ctu_number' => 'unique:opertation_lists,ctu_number,' . $id
            // ]);
            $opertationList = OpertationList::find($id);
        }

        $opertationList->category = $request->input('category');
        $opertationList->surgery_date = $request->input('surgery_date');
        $opertationList->patient_id = $request->input('patient');
        $opertationList->surgery_id = $request->input('surgery');
        $opertationList->diagnosis = $request->input('diagnosis');
        $opertationList->status = $request->input('status');
        $opertationList->save();

        return redirect()->route('operationList.index')->with('success', 'Operation detail saved successfully.');
    }
}
