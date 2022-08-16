<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Driver_Daily_Meter_Details;
use App\Models\Driver_Management;
use DateTime;

class Driver_Daily_Meter_Controller extends Controller
{
    public function login_meter_data(Request $request)
    {
        
        if($request->login_day_date != NULL )
        {
            if ($request->meter_reading_login != NULL) 
            {
                if ($request->meter_photo_login) 
                {
                    try {
                        $driver = Driver_Management::where('deleted_at', NULL)->where('driver_id',$request->driver_id)->first();
                        
                        if($driver)
                        {
                        $data1 = $request->all();
                        //dd($data1);
                        //return response()->json($data1);
                        $data=array(
                        'driver_id'=>$data1['driver_id'],
                        'login_day_date'=>date('Y-m-d H:i:s'),
                        'meter_reading_login'=>$data1['meter_reading_login'],
                        'logout_day_date'=>NULL,
                        'meter_reading_logout'=>Null,
                        'total_run_km'=>NULL,
                        'total_amount'=>NULL,
                        'created_at'=>date('Y-m-d H:i:s'),
                        );

                                    $image =  base64_decode($request->meter_photo_login);
                                    $imageName = time().'.jpg';
    
                                    file_put_contents(public_path() . '/uploads/driver__meter_login_photos/' . $imageName, $image);
                                    
                                    $image = 'uploads/driver__meter_login_photos/'.$imageName;
                                    $data['meter_photo_login'] = $image;
                        
                        //dd($data);  
                        $meter_login = Driver_Daily_Meter_Details::insertGetId($data);
                        //dd($meter_login);
                        if($meter_login)
                        return response()->json(3);
                        else
                        return response()->json(4);
                        }
                        else
                        {
                            return response()->json(5);
                        }
                            
                        // all good
                    } catch (\Exception $e) {
                    DB::rollback();
                    // dd($e);
                        return response()->json(4);
    
                    }
                }
                else
                {
                    return response()->json(2);
                }
                    
            }
            else
            {
                return response()->json(1);
            }
                        
        }
        else
        return response()->json(0);
                                 
    }

    public function logout_meter_data(Request $request)
    {
        if($request->logout_day_date != NULL)
        {
            if ($request->meter_reading_logout != NULL) 
            {
                if ($request->meter_photo_logout) 
                {
                    $driver_daily_data = Driver_Daily_Meter_Details::where('deleted_at', NULL)->where('driver_id',$request->driver_id)->latest()->first();
                    
                    
                    $driver = Driver_Management::where('deleted_at', NULL)->where('driver_id',$request->driver_id)->first();
                    //return response()->json($driver);

                    try {
                        if($request->meter_reading_logout && $driver_daily_data->meter_reading_login)
                        {

                            
                        $data1 = $request->all();
                        //dd($data1);
                        //return response()->json($data1);
                        $data=array(
                        'logout_day_date'=>date('Y-m-d H:i:s'),
                        'meter_reading_logout'=>$data1['meter_reading_logout'],
                        'total_amount'=>NULL,
                        'updated_at'=>date('Y-m-d H:i:s'),
                        );
    
							$image =  base64_decode($request->meter_photo_logout);
                                    $imageName = time().'.jpg';
    
                                    file_put_contents(public_path() . '/uploads/driver__meter_logout_photos/' . $imageName, $image);
                                    
                                    $image = 'uploads/driver__meter_logout_photos/'.$imageName;
                                    $data['meter_photo_logout'] = $image;
							

                        $total_run_km = floatval($data1['meter_reading_logout']) - floatval($driver_daily_data->meter_reading_login);
                        $data['total_amount'] = round(floatval($driver->amount_per_km)*floatval($total_run_km), 2);
                        $data['total_run_km'] = $total_run_km;

$date1 = strtotime($driver_daily_data->login_day_date);
$date2 = strtotime($data['logout_day_date']);
$hrs1 = abs($date2 - $date1)/(60*60);
$hrs=number_format((float)$hrs1, 2, '.', '');

$data['total_hrs']   = $hrs;

                        //dd($data);
                        $meter_logout = $driver_daily_data->update($data);
                        //dd($meter_logout);
                        return response()->json(3);
                        }
                        else
                        {
                            return response()->json(5);
                        }
                            
                        // all good
                    } catch (\Exception $e) {
                    DB::rollback();
                    // dd($e);
                        return response()->json(4);
    
                    }
                }
                else
                {
                    return response()->json(2);
                }
                    
            }
            else
            {
                return response()->json(1);
            }
                        
        }
        else
        return response()->json(0);
                                 
    }


    
    public function check_login_meter_details(Request $request)
    {

        try {   
            $login_data = Driver_Daily_Meter_Details::where('deleted_at',NULL)->where('meter_reading_logout',NULL)->where('driver_id',$request->driver_id)->latest()->first();
            if(is_null($login_data->logout_day_date))
                return response()->json(1);
            else{
                return response()->json(0);
            
            }
        } catch (Exception $e) {
            
            return response()->json(2);
        }
    
        
    }
}
