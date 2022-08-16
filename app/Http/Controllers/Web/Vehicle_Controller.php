<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\Vehicles;
use App\Models\Add_Area;
use App\Models\Add_City;
use Illuminate\Support\Facades\DB;


class Vehicle_Controller extends Controller
{
    public function vehicle_type()
    {
        try {    
            $data['VehicleTypes'] = VehicleType::get();
            
            return view('admin.vehicle_type',$data);
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    // public function show($id){
    // 	$area = Add_Area::findOrFail($id);
    //     return view('admin.users.destroy', compact('area'));
    // }

    public function storeVehicleType(Request $request)
    {

        
        $validator = $request->validate([
            'vehicle_type' => 'required',
            
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'vehicle_type'=>$data1['vehicle_type'],
            );

            
            // dd($data);  
            $area = VehicleType::insertGetId($data);

            if($area) {
                return redirect()->back()->with('success', 'Vehicle Type was successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("area")->with('error', 'Area not added');

        }
    }

    public function edit($id){
        if(session()->get('login_data.area') == 1)
        {
    	$area = DB::table('area')->where('area.id', $id)->join('city','city.id','area.city_id')->select('area.*','city.id as city_id','city.city as city_name')->first();
        // dd($area);
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$area->city_id])->get();
        $All_Areas = DB::table('area')->whereNotIn('area.id', [$id])->where('area.deleted_at', NULL)->join('city','city.id','area.city_id')->select('area.*','city.city as city_name')->get();
        return view('admin.area.edit', compact('area','All_Areas','All_Cities'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'area' => 'required',
            'city_id' => 'required',            
        ]);
        
        $area = Add_Area::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $areaUpdated = $area->update($data);
            if($areaUpdated) {
                
                return redirect("area")->with('success', 'Area updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("area")->with('error', 'Area not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }
    public function deleteVehicleType($id)
    {
        // return response()->json($id);
        try{
            $data = VehicleType::find($id)->delete();
            return redirect()->back()->with('success', 'Vehicle deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("area")->with('error', 'Vehicle not deleted successfully');


        } 
    }
    public function vehicles()
    {
        try {    
            $data['VehicleTypes'] = VehicleType::get();
            $data['vehicles'] = Vehicles::join('vehicle_types','vehicle_types.id','=','vehicles.vehicle_type_id')
                                ->select('vehicle_types.vehicle_type','vehicles.*')
                                ->get();
            
            return view('admin.vehicles',$data);
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
    public function storeVehicles(Request $request)
    {
        $validator = $request->validate([
            'vehicle_type_id' => 'required',
            
        ]);

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'vehicle_type_id'=>$data1['vehicle_type_id'],
                'vehicle_name'=>$data1['vehicle_name'],
            );

            
            // dd($data);  
            $area = Vehicles::insertGetId($data);

            if($area) {
                return redirect()->back()->with('success', 'Vehicle  was successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("area")->with('error', 'Vehicle not added');

        }
    }
    public function deleteVehicle(Request $request)
    {
        try{
            $data = Vehicles::find($request->id)->delete();
            return redirect()->back()->with('success', 'Vehicle deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("area")->with('error', 'Vehicle not deleted successfully');


        } 
    }
}
