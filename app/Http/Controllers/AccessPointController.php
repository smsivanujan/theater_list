<?php

namespace App\Http\Controllers;

use App\Models\AccessPoint;
use Illuminate\Http\Request;

class AccessPointController extends Controller
{
    use ValidatesRequests;
    public function index($id)
    {
        //
        $access_model = AcesssModel::find($id);
        $access_point = AcesssPoint::where('access_model_id', $id)->get();

        return view('layouts.auth.accessPoint')
        ->with('access_model', $access_model)
        ->with('access_point', $access_point);
    }

    public function store(Request $request)
    {

        $id = $request->id;

        if ($id == 0
        ) { // create

            $this->validate($request, [
                'display_name' => 'unique:acesss_points,display_name',
                'value' => 'unique:acesss_points,value'
            ]);

            $acesssPoint = new AcesssPoint();
        } else { // update
            $this->validate($request, [
                'display_name' => 'unique:acesss_points,display_name,' . $id,
                'value' => 'unique:acesss_points,value,' . $id
            ]);

            $acesssPoint = AcesssPoint::find($id);
        }

        try {
            $acesssPoint->display_name = $request->input('display_name');
            $acesssPoint->value = $request->input('value');
            $acesssPoint->access_model_id = $request->input('access_model_id');
            $acesssPoint->save();

            return redirect()->route('access_point.index', ['id' => $request->input('access_model_id')])->with('success', 'Accsess Point Added Sucessfully');
        } catch (\Throwable $th) {
            return redirect()->route('access_point.index')->with('error', 'Accsess Point Added Failed');
        }
    }

    public function destroy(Request $request)
    {
        //
        // $a = false;
        // $data = acesssPoint::find($request->input('delete_id'));
        // $data->delete();
        // $a = app('App\Http\Controllers\ActivityLogController')->index("Remove Access Point");
        // if ($a == true) {
        //     return redirect()->route('access_point.index', ['id' => $request->input('access_model_id')])->with('msg', 'Successfully Removed!!!');
        // } else {
        //     return "Error";
        // }
    }
}
