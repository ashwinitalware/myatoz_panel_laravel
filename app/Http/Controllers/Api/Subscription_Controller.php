<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Customer;
use App\Models\Add_Subscription;
use App\Models\Booking_Ride;
use App\Models\Add_E_Pass;
use Illuminate\Support\Carbon;
use App\Models\Add_City;
use DB;

class Subscription_Controller extends Controller
{
    public function all_data_show_subscription(Request $request)
    {

        try {            
                
            $data = DB::table('subscription')->where('subscription.deleted_at', NULL)->where('subscription.hide', 0)->where('subscription.city_id', $request->city_id)->join('city','city.id','subscription.city_id')
            ->select('subscription.*','city.city as city_name')->get();
            return response()->json($data);
            
        } catch (Exception $e) {
            
            return response()->json(0);
        }
    
        
    }
    public function check_subscription_avail(Request $request)
    {

        try {   
            // Old Logic
            // $e_pass_data = Add_E_Pass::where('deleted_at',NULL)->where('customer_id',$request->customer_id)->latest()->first();
            // if(!$e_pass_data)
            // return response()->json(0);//booking not happens
            // else{
            // $subscription_data = Add_Subscription::where('deleted_at',NULL)->where('id',$e_pass_data->subscription_id)->first();
            // $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->where('customer_id', $request->customer_id)->sum('ride_total_person');
            
            // if(($booking_ride_data)>=$e_pass_data->duration )
            // return response()->json(0);//booking not happens
            // else
            // return response()->json(1);//booking happens
            

            $e_pass_data = Add_E_Pass::where('deleted_at',NULL)->where('customer_id',$request->customer_id)->latest()->first();
            if(!$e_pass_data)
            return response()->json(0);//booking not happens
            else{
            $subscription_data = Add_Subscription::where('deleted_at',NULL)->where('id',$e_pass_data->subscription_id)->first();
            $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->where('customer_id', $request->customer_id)->sum('added_persons');
            $t = $e_pass_data->duration - $booking_ride_data ;
            $parse_date = Carbon::parse($e_pass_data->from_date);
            $to_date = $parse_date->addDays($t)->format('Y-m-d');
            if(Carbon::now()->format('Y-m-d')>$to_date)
            return response()->json(0);//booking not happens
            else
            return response()->json(1);//booking happens
            }
        } catch (Exception $e) {
            
            return response()->json(2);
        }
    
        
    }


   


}
