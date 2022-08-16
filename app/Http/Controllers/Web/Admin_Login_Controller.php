<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usermanagement;

class Admin_Login_Controller extends Controller
{
    public function admin_login(Request $request)
    {

        // return response()->json("Reach");

        try {            
            $data = Usermanagement::where('username',$request->username)->where('password',$request->password)->where('deleted_at', NULL)->first();
            if($data)
            {
                $request->session()->put('login_data',$data);
                if($data->dashboard == 1)
                return redirect('/dashboard');
                elseif($data->city == 1)
                return redirect('/city');
                elseif($data->area == 1)
                return redirect('/area');
                elseif($data->insurance == 1)
                return redirect('/insurance');
                elseif($data->subscription == 1)
                return redirect('/subscription');
                elseif($data->payment == 1)
                return redirect('/payment');
                elseif($data->driver == 1)
                return redirect('/driver');
                elseif($data->customer == 1)
                return redirect('/customer');
                elseif($data->account == 1)
                return redirect('/account');
                elseif($data->contact_us == 1)
                return redirect('/contact_us');
                elseif($data->timeslot == 1)
                return redirect('/timeslot');
                elseif($data->timetable == 1)
                return redirect('/timetable');
                elseif($data->notes == 1)
                return redirect('/notes');
                elseif($data->usermanegment == 1)
                return redirect('/usermanegment');
                elseif($data->employee == 1)
                return redirect('/employee');
                elseif($data->reports == 1)
                return redirect('/reports');
                else
                return redirect('/');


            }
            else
            return redirect('/');

           } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
}
