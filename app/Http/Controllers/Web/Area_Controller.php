<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Area;
use App\Models\Add_City;
use Illuminate\Support\Facades\DB;


class Area_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.area') == 1)
            {    
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            $All_Areas = DB::table('area')->where('area.deleted_at', NULL)->join('city','city.id','area.city_id')->select('area.*','city.city as city_name')->get();
            // return response()->json($All_Cities);
            
            return view('admin.area.index', compact('All_Areas','All_Cities'));
        }
        else
        return redirect('/');
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    // public function show($id){
    // 	$area = Add_Area::findOrFail($id);
    //     return view('admin.users.destroy', compact('area'));
    // }

    public function store(Request $request)
    {

        
        $validator = $request->validate([
            'city_id' => 'required',
            'area' => 'required',
            
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'area'=>$data1['area'],
                'city_id'=>$data1['city_id'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            
            // dd($data);  
            $area = Add_Area::insertGetId($data);

            if($area) {
                return redirect("area")->with('success', 'Area was successfully added!');
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
    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_Area::find($id)->delete();
            return redirect("area")->with('success', 'Area deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("area")->with('error', 'Area not deleted successfully');


        } 
    }
}
