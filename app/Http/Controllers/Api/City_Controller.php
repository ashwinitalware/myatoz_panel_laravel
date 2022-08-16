<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_City;
use DB;

class City_Controller extends Controller
{
    public function all_data_show_city()
    {

        try {            
                
            $data = Add_City::where('deleted_at', NULL)->get();
            return response()->json($data);
            
        } catch (Exception $e) {
            
            return response()->json(00);
        }
    
        
    }
    public function add_city(Request $request)
    {
    	
        try{
            //Request is valid, create new data
            $area = Add_City::create([
                'city' => $request->city,
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            
            if($area) {                
                return response()->json(1);
            }
            else {
                return response()->json(0);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(00);
        }
    }
    public function update_added_city(Request $request)
    {
        try {   
            $data=array(
                'city' => $request->city,
                'updated_at'=>date('Y-m-d H:i:s'),  
            );
            $city = Add_City::where('id', [$request->id])->update($data);

            if($city) {
                // return redirect("admin/faqs")->with('success', 'FAQ was successful update!');
                return response()->json(1);
            }
        
            } catch (\Exception $e) {

               DB::rollback();
               return response()->json(00);
        }
    }
    public function destroy_city(Request $request)
    {
        try{
            $data = Add_City::find($request->id)->delete();
            return response()->json(1);
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return response()->json(00);
        } 
    }
}
