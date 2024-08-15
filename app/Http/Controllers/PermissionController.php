<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index($id)
    {
        //get user role permission array
        $permission = Permission::where('user_id', $id)->first();
        // get user role by id
        $user = User::find($id);
        //get Access models
        $access_model = AcesssModel::all();
        //get all access point
        $access_point = AcesssPoint::all();
        return view('layouts.auth.permission')
            ->with('access_model', $access_model)
            ->with('user', $user)
            ->with('permission', $permission)
            ->with('access_point', $access_point);
    }

    public function store(Request $request)
    {
        $prives = $request->input('checkboxvar');

        // $a = app('App\Http\Controllers\ActivityLogController')->index("Permission Added");

        $pid = $request->input('permission_id');
        if ($pid == 0) { // create


            $permission = new permission();
        } else { // update

            $permission = permission::find($pid);
        }

        try {

            $a = false;

            $permission->permision = json_encode($prives);
            $permission->user_id = $request->input('user');


            $permission->save();

            return redirect()->route('user.index')->with('success', 'Permission Added Sucessfully');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', 'Permission Added Failed');
        }
    }
}
