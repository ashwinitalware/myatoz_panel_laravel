<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Timeslot;
use Illuminate\Support\Facades\DB;

class Timeslot_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.timeslot') == 1)
            {   
            $All_Timeslot = Add_Timeslot::where('deleted_at', NULL)->get();
           
            return view('admin.timeslot.index', compact('All_Timeslot'));
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
            'timeslot' => 'required',
           
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'timeslot'=>$data1['timeslot'],
                'created_at'=>date('Y-m-d H:i:s')
            );

            
            // dd($data);  
            $timeslot = Add_Timeslot::insertGetId($data);
            //dd($area);
            if($timeslot) {
                return redirect("timeslot")->with('success', 'Timeslot successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("timeslot")->with('error', 'Timeslot not added successfully');

        }
    }

    public function destroy($id)
    {
        try
            {
                $data = Add_Timeslot::find($id)->delete();
                return redirect("timeslot")->with('success', 'Timeslot deleted successfully');
            } 
        catch (\Exception $e) 
            {
                return redirect("timeslot")->with('error', 'Timeslot not deleted successfully');
            } 
    }
}
