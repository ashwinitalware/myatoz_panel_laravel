<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Timetable;
use Illuminate\Support\Facades\DB;

class Timetable_Controller extends Controller
{
    public function getTimeTable(Request $request)
    {
        try 
		{            
            $All_Timetables = Add_Timetable::with('from_area','to_area','city')
            ->where('city_id',$request->city_id)
			->groupBy('from_area_id')
			->groupBy('to_area_id')
            ->get();

			foreach($All_Timetables as $data)
			{
				$subAreas=Add_Timetable::where('city_id',$data->city_id)
										->where('from_area_id',$data->from_area_id)
										->where('to_area_id',$data->to_area_id)
										->select('sub_areas_id','timeslots_id')
										->get();
				$data['subAreas']=$subAreas;
			}
			
            if($All_Timetables)
            return response()->json(['data'=>$All_Timetables,'status'=>200]);
            else
            return response()->json(['status'=>201]);
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
}
