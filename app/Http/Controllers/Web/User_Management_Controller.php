<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usermanagement;
use Illuminate\Support\Facades\DB;

class User_Management_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.usermanegment') == 1)
            {    
            $All_Usermanagement = Usermanagement::where('deleted_at', NULL)->get();
           
            return view('admin.usermanagement.index', compact('All_Usermanagement'));
        }
        else
        return redirect('/');
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role_name' => 'required',
            
        ]);
        

    try {
             
            if($request->dashboard == null)
            $request->dashboard = 0;
            if($request->city == null)
            $request->city = 0;
            if($request->area == null)
            $request->area = 0;
            if($request->insurance == null)
            $request->insurance = 0;
            if($request->subscription == null)
            $request->subscription = 0;
            if($request->payment == null)
            $request->payment = 0;
            if($request->driver == null)
            $request->driver = 0;
            if($request->customer == null)
            $request->customer = 0;
            if($request->account == null)
            $request->account = 0;
            if($request->contact_us == null)
            $request->contact_us = 0;
            if($request->timeslot == null)
            $request->timeslot = 0;
            if($request->timetable == null)
            $request->timetable = 0;
            if($request->notes == null)
            $request->notes = 0;
            if($request->usermanegment == null)
            $request->usermanegment = 0;
            if($request->employee == null)
            $request->employee = 0;
            if($request->reports == null)
            $request->reports = 0;

            
            $data=array(
                'username'=>$request->username,
                'password'=>$request->password,
                'role_name'=>$request->role_name,
                'role'=>2,
                'dashboard'=>$request->dashboard,
                'city'=>$request->city,
                'area'=>$request->area,
                'insurance'=>$request->insurance,
                'subscription'=>$request->subscription,
                'payment'=>$request->payment,
                'driver'=>$request->driver,
                'customer'=>$request->customer,
                'account'=>$request->account,
                'contact_us'=>$request->contact_us,
                'timeslot'=>$request->timeslot,
                'timetable'=>$request->timetable,
                'notes'=>$request->notes,
                'usermanegment'=>$request->usermanegment,
                'employee'=>$request->employee,
                'reports'=>$request->reports,
                'created_at'=>date('Y-m-d H:i:s')
            );

            
            //dd($data);  
            $usermanagement = Usermanagement::insertGetId($data);
            //dd($usermanagement);
            if($usermanagement) {
                return redirect("usermanagement")->with('success', 'Usermanagement successfully added!');
            }

            //all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("usermanagement")->with('error', 'Usermanagement not added successfully');

        }
    }

    public function edit($id){
        if(session()->get('login_data.usermanegment') == 1)
        {
        $Usermanagement = Usermanagement::where('deleted_at', NULL)->where('id', $id)->first();
        $All_Usermanagement = Usermanagement::where('deleted_at', NULL)->whereNotIn('id', [$id])->get();
        return view('admin.usermanagement.edit', compact('All_Usermanagement','Usermanagement'));
    }
    else
    return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role_name' => 'required',    
        ]);
        
        $Usermanagement = Usermanagement::findOrFail($id);


        try {
            if($request->dashboard == null)
            $request->dashboard = 0;
            if($request->city == null)
            $request->city = 0;
            if($request->area == null)
            $request->area = 0;
            if($request->insurance == null)
            $request->insurance = 0;
            if($request->subscription == null)
            $request->subscription = 0;
            if($request->payment == null)
            $request->payment = 0;
            if($request->driver == null)
            $request->driver = 0;
            if($request->customer == null)
            $request->customer = 0;
            if($request->account == null)
            $request->account = 0;
            if($request->contact_us == null)
            $request->contact_us = 0;
            if($request->timeslot == null)
            $request->timeslot = 0;
            if($request->timetable == null)
            $request->timetable = 0;
            if($request->notes == null)
            $request->notes = 0;
            if($request->usermanegment == null)
            $request->usermanegment = 0;
            if($request->employee == null)
            $request->employee = 0;
            if($request->reports == null)
            $request->reports = 0;
          
            $data=array(
                'username'=>$request->username,
                'password'=>$request->password,
                'role_name'=>$request->role_name,
                'role'=>2,
                'dashboard'=>$request->dashboard,
                'city'=>$request->city,
                'area'=>$request->area,
                'insurance'=>$request->insurance,
                'subscription'=>$request->subscription,
                'payment'=>$request->payment,
                'driver'=>$request->driver,
                'customer'=>$request->customer,
                'account'=>$request->account,
                'contact_us'=>$request->contact_us,
                'timeslot'=>$request->timeslot,
                'timetable'=>$request->timetable,
                'notes'=>$request->notes,
                'usermanegment'=>$request->usermanegment,
                'employee'=>$request->employee,
                'reports'=>$request->reports,
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $UsermanagementUpdated = $Usermanagement->update($data);
            if($UsermanagementUpdated) {
                
                return redirect("usermanagement")->with('success', 'Usermanagement updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("usermanagement")->with('error', 'Usermanagement not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        try
            {
                $data = Usermanagement::find($id)->delete();
                return redirect("usermanagement")->with('success', ' Usermanagement deleted successfully');
            } 
        catch (\Exception $e) 
            {
                return redirect("usermanagement")->with('error', 'Usermanagement not deleted successfully');
            } 
    }
}
