<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Area;
use App\Models\Add_Subscription;
use App\Models\Booking_Ride;
use App\Models\Add_E_Pass;
use DB;

class Area_Controller extends Controller
{
    public function all_data_show_area(Request $request)
    {

        try {            
                
            $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $request->customer_id)->latest()->first();
            if($e_pass_data){
            $subscription_data = Add_Subscription::where('deleted_at',NULL)->where('id',$e_pass_data->subscription_id)->first();
            $All_Areas = DB::table('area')->where('area.deleted_at', NULL)->where('city.deleted_at', NULL)->where('area.city_id', $subscription_data->city_id)->join('city','city.id','area.city_id')
            ->select('area.*','city.city as city_name')->get();
            return response()->json($All_Areas);
            }
            else
            return response()->json(0);
            
        } catch (Exception $e) {
            
            return response()->json(0);
        }
    
        
    }
    public function add_area(Request $request)
    {
        try{
            //Request is valid, create new data
            $data = Add_Area::create([
                'area' => $request->area,
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            
            if($data) {                
                return response()->json(1);
            }
            else {
                return response()->json(0);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json('00');
        }
    }


    public function show($id)
    {
        try{

            $ContactUs = Add_Area::findOrFail($id);
            $allcontactus = Add_Area::where('deleted_at', NULL)->get();
            // dd($courseCategory);
            $allReplies = DB::table('contact_replies')->where('contact_us_id', $id)
                            ->join('users','users.id','contact_replies.user_id')
                            ->select('contact_replies.*','users.firstname as fname','users.lastname as lname')
                            ->get();
            //return response()->json($allReplies);

            return view('admin.contactus.show', compact('ContactUs', 'allcontactus','allReplies'));
           
        }
        catch (Exception $e){

            return redirect("admin/contactus")->with('error', 'something went wrong');
            // $e->getMessage();
        }
    }

    public function update_added_area(Request $request)
    {
        try {   
            $data=array(
                'area' => $request->area,
                'updated_at'=>date('Y-m-d H:i:s'),  
            );
            $area = Add_Area::where('id', [$request->id])->update($data);

            if($area) {
                // return redirect("admin/faqs")->with('success', 'FAQ was successful update!');
                return response()->json(1);
            }
        
            } catch (\Exception $e) {

               DB::rollback();
               return response()->json(0);
        }
    }
    public function destroy_area(Request $request)
    {
        try{
            $data = Add_Area::find($request->id)->delete();
            return response()->json(1);
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return response()->json(0);

        } 
    }
}
