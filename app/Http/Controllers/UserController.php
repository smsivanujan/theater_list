<?php

namespace App\Http\Controllers;


use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Crypt;
use App\Models\AcesssPoint;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use ValidatesRequests;
    // show users
    public function index()
    {
        //collection of users
        $super_admin_id = 1;

        $users = DB::table('users_cardio')
            ->select('id', 'name', 'email')
            //  ->where('employees.role_id','!=',$super_admin_id)
            ->get();

        return view('layouts.auth.user')
            ->with('users', $users);
        //  ->with('employees',$employees);
    }

    // create user
    public function store(Request $request)
    {
        // $actvity = 'New User Create - ' . $request->input('name');
        // $a = app('App\Http\Controllers\ActivityLogController')->index($actvity);
        $id = $request->id;

        if ($id == 0) { // create
            $this->validate($request, [
                'email' => 'unique:users_cardio,email'
            ]);

            $User = new User();
        } else { // update
            $this->validate($request, [
                'email' => 'unique:users_cardio,email,' . $id
            ]);

            $User = User::find($id);
        }

        try {
            $User->name = $request->input('name');
            $User->email = $request->input('email');
            $User->remember_token = null;
            $User->email_verified_at = null;
            $User->password = Hash::make($request->input('password'));
            $User->save();

            return redirect()->route('user.index')->with('success', 'User Added Sucessfully');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', 'User Added Failed');
        }
    }

    // user login
    public function login(Request $request)
    {
        //validate the details
        $request->validate([
            "email" => "required",
            "password" => "required|min:0|max:12"
        ]);


        $user = DB::table('users_cardio')
            ->select('users_cardio.*', 'users_cardio.password')
            ->where('users_cardio.email', '=', $request->input('email'))
            ->first();


        // if user 
        if ($user) {

            $hashedPassword =$user->password;                 
            
            if (Hash::check($request->input('password'), $hashedPassword)) {

                $data = User::Where('email', $user->email)->first();

                Auth::login($data);

                // get permission for route access
                $permisions = Permission::Where('user_id', $user->id)->first();
                $accessPoint = AcesssPoint::all();
                // return $permisions;
                if ($permisions) {  // check this role have permisions
                    $permis = json_decode($permisions->permision);
                    $count = count($permis);
                    $access = array();
                    $x = 0;
                    for ($i = 0; $i < $count; $i++) {
                        foreach ($accessPoint as $row) {
                            if ($permis[$i] == $row->id) {
                                $access[$x] = $row->value;
                                $x++;
                                break;
                            }
                        }
                    }
                } else {
                    $access = array();

                }

                // return $access;
                $request->session()->put('Access', $access);

                $status = 'Log in';
                // $a = app('App\Http\Controllers\LoginLogController')->store($status);

                if (in_array('index.dashboard', $access)) {
                    // return "sucesss";
                    return redirect()->route('index.dashboard');
                } else {
                    // return "error";
                    return redirect()->route('login');
                }

                // return redirect('/dashboard');
            } else {
                //invalid user
                return view('layouts.auth.login')->with('fail', 'Invalid username  or Password!');
            }
        } else {
            // not register this email
            return view('layouts.auth.login')->with('fail', 'No account found in this email');
        }
    }

    // token create
    public function token(Request $request)
    {
        //here check it token base login
        if (isset($request->token)) {
            //here check token 
            $token = $request->token;
            $tokenParts = explode(".", $token);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtHeader = json_decode($tokenHeader);
            $jwtPayload = json_decode($tokenPayload);
            $valid = $jwtPayload->exp; // this one login expery

            $currentTime = \Carbon\Carbon::now();

            if ($valid > $currentTime->timestamp) {
                //get login details
                $user = User::where('login_token', $request->token)->first();
                if ($user) {

                    Auth::login($user);
                    $emp = user::where('id', Auth::user()->emp_id)->first();

                    $permisions = permission::Where('user_role_id', $emp->role_id)->first();
                    $accessPoint = acesssPoint::all();


                    if ($permisions) {  // check this role have permisions
                        $permis = json_decode($permisions->permision);
                        $count = count($permis);
                        $access = array();
                        $x = 0;
                        for ($i = 0; $i < $count; $i++) {
                            foreach ($accessPoint as $row) {
                                if ($permis[$i] == $row->id) {
                                    $access[$x] = $row->value;
                                    $x++;
                                    break;
                                }
                            }
                        }
                    } else {
                        $access = array();
                    }

                    $request->session()->put('Access', $access);

                    $status = 'Log in';
                    // $a = app('App\Http\Controllers\LoginLogController')->store($status);

                    if (in_array('hr.dashboard', $access)) {
                        return redirect()->route('hr.dashboard');
                    } else {
                        return redirect()->route('hr.auth.dashboard');
                    }

                    // return redirect()->route('/dashboard');

                } else {
                    // "wrong token";
                    return view('layouts.auth.login'); //login page
                }
            } else {
                //"tokenexpire";
                return view('layouts.auth.login'); //login page
            }
        } else {
            //direct login gate
            //return "token not founded";
            if(Auth::user())
            {
                return redirect('/dashboard'); //login page
            }
            return view('layouts.auth.login'); //login page
        }
    }

    // user logout
    public  function logout()
    {

        $status = 'Log out';
        // $a = app('App\Http\Controllers\LoginLogController')->store($status);

        Auth::logout();

        return redirect('/admin/login');
    }

    // user delete
    public function destroy(Request $request)
    {
        //delete user
        $data = User::find($request->input('delete_id'));
        $data->delete();

        $actvity = 'User Delete , emp_id - ' . $data->emp_id;
        // $a = app('App\Http\Controllers\ActivityLogController')->index($actvity);

        return redirect()->route('user.index')->with('msg', 'Record has been removed!!!');
    }

    // viewProfile
    //  public function viewProfile()
    //  {
    //      // auth user id
    //      $user_id = Auth::guard()->user()->id;

    //      $user_details = DB::table('users_cardio')
    //          ->select('users_cardio.id as user_id', 'employees.*', 'departments.name as department_name', 'user_roles.user_role as role_name', 'work_types.name as work_type_name', 'employee_types.type as employee_type')
    //          ->leftJoin('employees', 'employees.id', 'users_cardio.emp_id')
    //          ->leftJoin('departments', 'departments.id',  'employees.department_id')
    //          ->leftJoin('user_roles', 'user_roles.id',  'employees.role_id')
    //          ->leftJoin('work_types', 'work_types.id',  'employees.work_type_id')
    //          ->leftJoin('employee_types', 'employee_types.id',  'employees.employee_type_id')
    //          ->where('users_cardio.id', $user_id)
    //          ->first();
    //      // return $user_details;

    //      return view('page.profile')
    //          ->with('user_details', $user_details);
    //  }

    // password change
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:5|max:12',
            'new_confirm_password' => ['same:new_password'],
        ]);


        $uid = Auth::user()->id;  // user id

        $user = User::find($uid);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.view.profile')
            ->with('success', 'Password changed');
    }
}
