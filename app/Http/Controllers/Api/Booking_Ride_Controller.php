<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Area;
use App\Models\Add_Customer;
use App\Models\Add_Driver;
use Illuminate\Support\Carbon;
use App\Models\Add_Subscription;
use App\Models\Add_E_Pass;
use App\Models\Booking_Ride;
use App\Models\Driver_Management;
use App\Models\Driver_Substop;

class Booking_Ride_Controller extends Controller
{



    public function all_ride_today(Request $request)
    {
        // try {
                $data['driver_management'] = Driver_Management::with('pickup_details','drop_details')->where('deleted_at', Null)->where('driver_id', $request->driver_id)->latest()->first();

                $substops=Driver_Substop::where('driver_id',$request->driver_id)->get()->toArray();
            
           
                $data['driver_details'] = Add_Driver::where('deleted_at', Null)->where('id', $request->driver_id)->first();

                $data['all_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')
                ->join('driver_substops','driver_substops.subStop_id','=','pickup_area_id')
                ->where('deleted_at', Null)
                ->where('ride_booking_date',Carbon::now()->format('Y-m-d'))
                ->where('booking_ride.driver_id', Null)
                ->where('driver_substops.driver_id', $request->driver_id)
                ->whereRaw("FIND_IN_SET(?, driver_who_canceled_id) = 0", [$request->driver_id])
                ->where('status','active')
                ->select('booking_ride.*')
                ->get();
                                      
                // $data['all_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('pickup_area_id', $data['driver_management']['area_id'])->where('drop_off_area_id', $data['driver_management']['to_area_id'])->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', Null)->whereRaw("FIND_IN_SET(?, driver_who_canceled_id) = 0", [$request->driver_id])->where('status','active')->get();
                 
                // $data['all_ride_back'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('pickup_area_id', $data['driver_management']['to_area_id'])->where('drop_off_area_id', $data['driver_management']['area_id'])->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', Null)->whereRaw("FIND_IN_SET(?, driver_who_canceled_id) = 0", [$request->driver_id])->where('status','active')->get();
                
                           
                $data['driver_today_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', $request->driver_id)->where('status','midactive')->latest()->get();
                                   
                $data['driver_today_completed_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', $request->driver_id)->where('status','inactive')->latest()->get();
                                
                return response()->json($data);   
                                
            
        // } catch (\Throwable $th) {
        //     return response()->json(0);
        // }
    }

    public function booking_ride(Request $request)
    {
        $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();
        $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
        $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->sum('added_persons');
        
        if(($booking_ride_data + $request->added_persons + 1)>$e_pass_data->duration ){
        if($request->added_persons==0)
        return response()->json(0);//booking not happens
        else
        return response()->json(3);//booking not happens
        }
        if(($booking_ride_data + $request->added_persons + 1)<=$e_pass_data->duration )
        {
            date_default_timezone_set('Asia/Kolkata');
            $data1 = $request->all();



            $limit_count=Booking_Ride::where('ride_booking_date',date("Y-m-d"))->where('customer_id',$customer_data->id)->where('status','inactive')->count();
            
            if($customer_data->daily_limit==$limit_count)
            {
                return response()->json(4);
            }
            
            $data=array(
                'customer_id'=>$data1['customer_id'],
                'customer_epass_id'=>$e_pass_data->id,
                'ride_booking_date'=>date("Y-m-d"),
                'ride_booking_time'=>date("g:i a"),
                'driver_who_canceled_id'=>0,
                'pickup_area_id'=>$data1['pickup_area_id'],
                'drop_off_area_id'=>$data1['drop_off_area_id'],
                'added_persons'=>$data1['added_persons'],
                'ride_total_person'=>$data1['added_persons']+1,
                'created_at'=>date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $booking_done = Booking_Ride::insertGetId($data);
            if($booking_done)
            {
                $ids=Add_Driver::join('driver_substops','driver_substops.driver_id','=','add_driver.id')
                     ->where(function ($query) use ($data1) {
                        $query->where('driver_substops.subStop_id',$data1['pickup_area_id'])
                                ->orWhere('driver_substops.subStop_id',$data1['drop_off_area_id']);
                        })
                    ->where('add_driver.deleted_at', NULL)
                    ->pluck('fcm_token')->all();
                $notification_result = $this->sendNotification($ids);
                return response()->json(1);//booking happens
            }
            else
            {
                return response()->json(2);//booking not happens DB issue
            }

        }
    }

    public function get_customer_ride_history(Request $request)
    {
        try {            
                
            $ride_data = Booking_Ride::where('booking_ride.deleted_at', Null)->where('booking_ride.customer_id', $request->customer_id)
            ->where('pickup_details.deleted_at', Null)->where('dropoff_details.deleted_at', Null)
            ->where('booking_ride.status','inactive')
            ->join('area as pickup_details','pickup_details.id','booking_ride.pickup_area_id')
            ->join('area as dropoff_details','dropoff_details.id','booking_ride.drop_off_area_id')
            ->select('booking_ride.*','pickup_details.area as pickup',
            'dropoff_details.area as dropoff')
            ->latest()->get();
            return response()->json($ride_data);
            
        } catch (Exception $e) {
            
            return response()->json(0);
        }
    }

    public function get_driver_ride_history(Request $request)
    {

        
        try {            
                
            $data['ride_data'] = Booking_Ride::with('driver_details','customer_details')
            ->where('booking_ride.deleted_at', Null)->where('pickup_details.deleted_at', Null)->where('dropoff_details.deleted_at', Null)
            ->where('booking_ride.driver_id', $request->driver_id)
            ->where('booking_ride.status','inactive')
            ->join('area as pickup_details','pickup_details.id','booking_ride.pickup_area_id')
            ->join('area as dropoff_details','dropoff_details.id','booking_ride.drop_off_area_id')
            ->select('booking_ride.*','pickup_details.area as pickup',
            'dropoff_details.area as dropoff')
            ->latest()->get();
            return response()->json($data);
            
        } catch (Exception $e) {
            
            return response()->json(0);
        }
    }

    public function get_ride_confirmed_by_driver(Request $request)
    {
        try 
        {            
                
            $ride_confirmed = Booking_Ride::with('driver_details','pickup_details','dropoff_details')
            ->where('deleted_at', Null)->where('customer_id', $request->customer_id)
            ->where('ride_booking_date',Carbon::now()->format('Y-m-d'))
            ->latest()->first();
            if($ride_confirmed)
            return response()->json($ride_confirmed);


        } catch (Exception $e) {
            
            return response()->json(0);
        }
    }


    public function confirm_ride(Request $request)
    {
        
        $driver_today_ride = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', $request->driver_id)->where('status','midactive')->latest()->first();
       if ($driver_today_ride)
       return response()->json(2);            
       else    
        $booked_ride = Booking_Ride::findOrFail($request->confirm_ride_id);
          
        try {
           
                $ride = Booking_Ride::findOrFail($request->confirm_ride_id);
                $ride->driver_id = $request->driver_id;
                $ride->status = 'midactive';
                $ride->update();
                if($ride)
                return response()->json(1);    
           
        } catch (\Exception $e) {
                return response()->json(0);    
        }
    }
    public function confirm_ride_back(Request $request)
    {
        
        $driver_today_ride = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->where('deleted_at', Null)->where('ride_booking_date',Carbon::now()->format('Y-m-d'))->where('driver_id', $request->driver_id)->where('status','midactive')->latest()->first();
       if ($driver_today_ride)
       return response()->json(2);            
       else    
        $booked_ride = Booking_Ride::findOrFail($request->confirm_ride_id);
          
        try {
           
                $ride = Booking_Ride::findOrFail($request->confirm_ride_id);
                $ride->driver_id = $request->driver_id;
                $ride->status = 'midactive';
                $ride->update();
                if($ride)
                return response()->json(1);    
           
        } catch (\Exception $e) {
                return response()->json(0);    
        }
    }


    public function cancle_ride(Request $request)
    {
        $booked_ride = Booking_Ride::findOrFail($request->cancle_ride_id);
        //return response()->json($booked_ride->driver_who_canceled_id);    
          
            

        try {
            if($booked_ride->driver_who_canceled_id == NULL)
            {
                
                $ride = Booking_Ride::findOrFail($request->cancle_ride_id);
                $ride->driver_who_canceled_id = $request->driver_id;
                $ride->update();
                if($ride)
                return response()->json(1);    
                else
                return response()->json(2);
            }
             else
            {
                $dwc = $booked_ride->driver_who_canceled_id.','.$request->driver_id;
                $ride = Booking_Ride::findOrFail($request->cancle_ride_id);
                $ride->driver_who_canceled_id = $dwc;
                $ride->update();
                if($ride)
                return response()->json(1);    
                else
                return response()->json(2);
            }
            
            return response()->json(0);    
           
        } catch (\Exception $e) {
                return response()->json(0);    
        }
    }

    public function confirm_drop(Request $request)
    {

          
            

        try {
                $booked_ride = Booking_Ride::findOrFail($request->ride_id);
                $booked_ride->status = 'inactive';
                $booked_ride->update();
                if($booked_ride)
                return response()->json(1);    
            
           
        } catch (\Exception $e) {
                return response()->json(0);    
        }
    }

    public function cancle_ride_by_customer(Request $request)
    {
        try{
            $ride = Booking_Ride::findOrFail($request->id);
            $ride->status = 'deactive';
            $ride->update();
            return response()->json(['data'=>$ride,'status'=>200]);
        } catch (\Exception $e) {
            return response()->json(['data'=>0,'status'=>201]);
        } 
    }
    
    public function driver_scan_booking(Request $request)
    {
        $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('e_pass_no', $request->e_pass_no)->where('status','active')->latest()->first();
        if($e_pass_data)
        {
            $driver_management = Driver_Management::with('pickup_details','drop_details')->where('deleted_at', Null)->where('driver_id', $request->driver_id)->where('status','active')->latest()->first();
            $customer = Add_Customer::where('id',$e_pass_data->customer_id)->where('deleted_at', NULL)->where('status','active')->first();
            $subscription_data = Add_Subscription::where('deleted_at',NULL)->where('id',$e_pass_data->subscription_id)->first();
            $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->where('customer_id', $request->customer_id)->sum('ride_total_person');
            $t = $e_pass_data->duration - $booking_ride_data ;
            $parse_date = Carbon::parse($e_pass_data->from_date);
            $to_date = $parse_date->addDays($t)->format('Y-m-d');
            if(Carbon::now()->format('Y-m-d')>$to_date)
            return response()->json(['data'=>0,'status'=>201]);//booking not happens
            else{
            
            return response()->json(['data'=>$e_pass_data,'status'=>200]);//booking happens
            }
        }
        else
        {
            return response()->json(['data'=>0,'status'=>202]);//Scan not valid
        }
    }
    public function booking_ride_by_driver(Request $request)
    {
        $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();
        $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
        $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $request->e_pass_id)->sum('ride_total_person');
        
        if(($booking_ride_data + $request->added_persons + 1)>$e_pass_data->duration ){
        if($request->added_persons==0)
        return response()->json(0);//booking not happens
        else
        return response()->json(3);//booking not happens
        }
        if(($booking_ride_data + $request->added_persons + 1)<=$e_pass_data->duration )
        {
            date_default_timezone_set('Asia/Kolkata');
            $data1 = $request->all();
            $data=array(
                'customer_id'=>$data1['customer_id'],
                'customer_epass_id'=>$request->e_pass_id,
                'ride_booking_date'=>date("Y-m-d"),
                'ride_booking_time'=>date("g:i a"),
                'driver_id'=>$request->driver_id,
                'driver_who_canceled_id'=>0,
                'pickup_area_id'=>$data1['pickup_area_id'],
                'drop_off_area_id'=>$data1['drop_off_area_id'],
                'added_persons'=>$data1['added_persons'],
                'ride_total_person'=>$data1['added_persons']+1,
                'status'=>'midactive',
                'created_at'=>date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $booking_done = Booking_Ride::insertGetId($data);
            if($booking_done)
            return response()->json(1);//booking happens
            else
            return response()->json(2);//booking not happens DB issue

        }
    }

    public function booking_ride_by_customer(Request $request)
    {
        $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();


        $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
        $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $request->e_pass_id)->sum('ride_total_person');
        
        if(($booking_ride_data + $request->added_persons + 1)>$e_pass_data->duration ){
        if($request->added_persons==0)
        return response()->json(0);//booking not happens
        else
        return response()->json(3);//booking not happens
        }
        if(($booking_ride_data + $request->added_persons + 1)<=$e_pass_data->duration )
        {
            date_default_timezone_set('Asia/Kolkata');
            $data1 = $request->all();

            $limit_count=Booking_Ride::where('ride_booking_date',date("Y-m-d"))->where('customer_id',$customer_data->id)->where('status','inactive')->count();
            
            if($customer_data->daily_limit==$limit_count)
            {
                return response()->json(4);
            }

            $data=array(
                'customer_id'=>$data1['customer_id'],
                'customer_epass_id'=>$e_pass_data->id,
                'ride_booking_date'=>date("Y-m-d"),
                'ride_booking_time'=>date("g:i a"),
                'driver_id'=>$request->driver_id,
                'driver_who_canceled_id'=>0,
                'pickup_area_id'=>$data1['pickup_area_id'],
                'drop_off_area_id'=>$data1['drop_off_area_id'],
                'added_persons'=>$data1['added_persons'],
                'ride_total_person'=>$data1['added_persons']+1,
                'status'=>'midactive',
                'created_at'=>date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $booking_done = Booking_Ride::insertGetId($data);
            if($booking_done)
            {
                $ids=Add_Driver::where('id',$request->driver_id)->pluck('fcm_token')->all();
                $notification_result = $this->sendNotification($ids);

                return response()->json(1);
            }
            else
            {
                return response()->json(2);//booking not happens DB issue
            }

        }
    }

    public function sendNotification($ids)
    {
        $firebaseToken = $ids;
          
        $SERVER_API_KEY = 'AAAAKldpvmw:APA91bEgrY15-ewsFIqe03-SD-v7r820MbdbIykGGHoIed7HCQk0HB_J_A10fGscyvdX9QQC4sTa2ZbMKDJ0mbZKjpvVIqQ9C8NJuJ7zW-TAFZChCMOQE7Dt5cPQnQJ8vYCjbQ5gHaGP';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'New Ride Booked ',
                "body" => 'Hi, There is a new ride for you.',  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        return $response = curl_exec($ch);
  
        // $response=json_encode($response);
        // if($response->success)
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
    }
}

// IMP QUERY for Comma seprated values in DB
 //$data['all_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->whereRaw("FIND_IN_SET(?, driver_who_canceled_id) = 0", [$request->driver_id])->where('deleted_at', Null)->get();
        //$data['all_ride'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')->whereRaw("FIND_IN_SET(?, driver_who_canceled_id) > 0", [$request->driver_id])->where('deleted_at', Null)->get();
