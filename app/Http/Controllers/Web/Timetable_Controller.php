<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Area;
use App\Models\Add_City;
use App\Models\Add_Timeslot;
use App\Models\Add_Timetable;
use Illuminate\Support\Facades\DB;

class Timetable_Controller extends Controller
{
    public function index()
    {
        try {   
            if(session()->get('login_data.timetable') == 1)
            {            
            $All_Timeslot = Add_Timeslot::where('deleted_at', NULL)->get();
             
            $All_Cities = Add_City::where('deleted_at', NULL)->get();

            $All_Timetables = Add_Timetable::with('from_area','to_area','city')->where('add_timetable.deleted_at', NULL)
            
            ->get();
            // return response()->json($All_Timetables);
            return view('admin.timetable.index', compact('All_Timeslot','All_Cities','All_Timetables'));
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
            'city_id' => 'required',
            'from_area_id' => 'required',
            'to_area_id' => 'required',
            'sub_areas_id' => 'required',
            
        ]);
        

    try {
             $timeslots_id = implode(",",$request->timeslots_id);

            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'city_id'=>$data1['city_id'],
                'from_area_id'=>$data1['from_area_id'],
                'to_area_id'=>$data1['to_area_id'],
                'sub_areas_id'=>$data1['sub_areas_id'],
                'timeslots_id'=>$timeslots_id,
                'created_at'=>date('Y-m-d H:i:s')
            );

            
            //dd($data);  
            $timetable = Add_Timetable::insertGetId($data);
            //dd($timetable);
            if($timetable) {
                return redirect("timetable")->with('success', 'Timetable successfully added!');
            }

            //all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("timetable")->with('error', 'Timetable not added successfully');

        }
    }

    public function destroy($id)
    {
        try
            {
                $data = Add_Timetable::find($id)->delete();
                return redirect("timetable")->with('success', ' Timetable deleted successfully');
            } 
        catch (\Exception $e) 
            {
                return redirect("timetable")->with('error', 'Timetable not deleted successfully');
            } 
    }
}
