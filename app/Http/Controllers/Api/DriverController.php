<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Add_Driver;
use Hash;
use App\Models\Driver_Management;
use Illuminate\Http\Request;
use Validator;
class DriverController extends Controller
{
    public function login_driver(Request $request)
    {
        try {
            $data = Add_Driver::where('contact_no',$request->contact_no)->where('deleted_at', NULL)->where('status', 'active')->first();
            if($data)
            {
                $driver_manag = Driver_Management::where('deleted_at', NULL)->where('driver_id',$data->id)->first();
                if($driver_manag)
                {
                    return response()->json(['data'=>$data,'status'=>200]);
                }
                else
                {
                    return response()->json(['data'=>$data,'status'=>203]);
                }
            }
            else
                return response()->json(['data'=>0,'status'=>201]);
            
        } catch (\Throwable $th) {
        return response()->json(['data'=>0,'status'=>202]);
        }
    }
    public function driver_data(Request $request)
    {
        

        $data = Add_Driver::where('id',$request->driver_id)->where('deleted_at', NULL)->first();
       
     
        if($data)
        return response()->json($data);
        else
        return response()->json(0);
        
    }

    // unique username

    public function check_user_id(Request $request)
    {
        $data = $request->all();
        // return $ $request->all();
        $validator = Validator::make($data, [
            'user_id' => 'required|unique:add_driver',
        ]);
        // return ($data);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['data' => "User ID not available",'status'=>201]);
        }
        else{
            return response()->json(['data' => "User ID is available",'status'=>200]);
        }
    }


    public function register_driver(Request $request)
    {
        
                $data = Add_Driver::where('auto_no',$request->auto_no)->first();
                   
                if($data)
                        return response()->json(1);
                else{
                    $data = Add_Driver::where('contact_no',$request->contact_no)->first();

                    if($data)
                        return response()->json(2);
                    else
                        {
                        try {

                            $latest = Add_Driver::latest()->first();

                                if (! $latest) {
                                    $driver_unique_no = 'MYATOZD00001';
                                    }
                                else{
                                    $string = preg_replace("/[^0-9\.]/", '', $latest->driver_unique_no);
                                    $driver_unique_no =  'MYATOZD' . sprintf('%06d', $string+1);

                            }
                                $data1 = $request->all();
                                //dd($data1);
                                //return response()->json($data1);
            
                                $data=array(
                                'city_id'=>$data1['city_id'],
                                'first_name'=>$data1['first_name'],
                                'middle_name'=>$data1['middle_name'],
                                'last_name'=>$data1['last_name'],
                                'gender'=>$data1['gender'],
                                'auto_no'=>$data1['auto_no'],
                                'auto_insurance_validity_expire_date'=>$data1['auto_insurance_validity_expire_date'],
                                'driver_unique_no'=>$driver_unique_no,
                                'user_id'=>"myatoz",
                                'address'=>$data1['address'],
                                'contact_no'=>$data1['contact_no'],
                                'password'=>Hash::make(12345678),
                                'account_holder_name'=>$data1['account_holder_name'],
                                'account_number'=>$data1['account_number'],
                                'ifsc_code'=>$data1['ifsc_code'],
                                'bank_name'=>$data1['bank_name'],
                                'nominee_details'=>$data1['nominee_details'],
                                'terms_cond'=>'accepted',
                                'status'=>'inactive',
                                'created_at'=>date('Y-m-d H:i:s'),
                                );

                                // if($request->hasFile('driver_photo_name')) {
                                // $image =  $request->file('driver_photo_name');
                                // $imageName = time().'.'.$image->getClientOriginalExtension();

                                // $imagePath = '/uploads/drivers_photo/driver/';
                                // $uploaded = $image->move(public_path($imagePath), $imageName);

                                // if($uploaded) {
                                // $image = 'uploads/drivers_photo/driver/'.$imageName;
                                // $data['driver_photo_name'] = $image;
                                // }
                                // else
                                // {
                                // $data['driver_photo_name'] = '';
                                // }
                                // }
								// else
                                // {
                                // $data['driver_photo_name'] = '';
                                // }
                                // if($request->hasFile('driver_aadhar_photo_name')) {
                                // $image =  $request->file('driver_aadhar_photo_name');
                                // $imageName = time().'.'.$image->getClientOriginalExtension();

                                // $imagePath = '/uploads/driver_photos/drivers_aadhar_photos/';
                                // $uploaded = $image->move(public_path($imagePath), $imageName);

                                // if($uploaded) {
                                // $image = 'uploads/driver_photos/drivers_aadhar_photos/'.$imageName;
                                // $data['driver_aadhar_photo_name'] = $image;
                                // }
                                // else
                                // {
                                // $data['driver_aadhar_photo_name'] = '';
                                // }
                                // }
								// else
                                // {
                                // $data['driver_aadhar_photo_name'] = '';
                                // }

                                if($request->driver_photo_name) {
                                    $image =  base64_decode($request->driver_photo_name);
                                    $imageName = time().'.'.$request->ext1;
    
                                    file_put_contents(public_path() . '/uploads/drivers_photo/driver/' . $imageName, $image);
                                    
                                    $image = 'uploads/drivers_photo/driver/'.$imageName;
                                    $data['driver_photo_name'] = $image;
                                }
                                if($request->driver_aadhar_photo_name) {
                                    $image2 =  base64_decode($request->driver_aadhar_photo_name);
                                    $imageName2 = time().'.'.$request->ext2;
    
                                    file_put_contents(public_path() . '/uploads/driver_photos/drivers_aadhar_photos/' . $imageName2, $image2);
     
                                    $image2 = 'uploads/driver_photos/drivers_aadhar_photos/'.$imageName2;
                                    $data['driver_aadhar_photo_name'] = $image2;
                                }
                                //dd($data);  
							    //return response()->json($data);
                                $driver = Add_Driver::insertGetId($data);
                                //dd($customer);  
                                if($driver) {
                                $data = Add_Driver::where('user_id',$request->user_id)->where('deleted_at', NULL)->first();
                                return response()->json($data);
                                }
                                else
                                return response()->json(3);


                                // all good
                            } catch (\Exception $e) {
                            DB::rollback();
                            // dd($e);
                                return response()->json(4);

                            }
                         }
                }
            
        
            
        
    }


    public function all_driver_data(Request $request)
    {
        

        $data = Add_Driver::where('deleted_at', NULL)->get();
       
     
        if($data)
        return response()->json($data);
        else
        return response()->json(0);
        
    }

    public function driver_detail_by_auto_no(Request $request)
    {
        

        $data['driver_data'] = Add_Driver::where('deleted_at', NULL)->where('status','active')->where('driver_unique_no',$request->driver_unique_no)->first();
        if($data['driver_data'] == NULL)
            return response()->json(['data'=>$data,'status'=>202]);
        else
        {
            $data['driver_management'] = Driver_Management::with('pickup_details','drop_details')->where('deleted_at', Null)->where('driver_id', $data['driver_data']->id)->latest()->first();

            if($data)
            return response()->json(['data'=>$data,'status'=>200]);
            else
            return response()->json(['data'=>0,'status'=>201]);
        
        }
        
    }
	
	public function editdriver(Request $request){
		$driver=Add_Driver::find($request->id);
		
	  if($driver->id)
            return response()->json($driver);
            else
            return response()->json(0);
	}
	public function updatedriver(Request $request){

                if($request->driver_photo_name_edit) {
                                $image =  base64_decode($request->driver_photo_name_edit);
                                $imageName = time().'.'.$request->ext1;

                                file_put_contents(public_path() . '/uploads/drivers_photo/driver/' . $imageName, $image);
                                
                                $image = 'uploads/drivers_photo/driver/'.$imageName;
                                $driver_photo_name = $image;
                                }
                                else
                                {
                                $driver_photo_name = $request->driver_photo_name;

                                }

			$result=Add_Driver::where('id','=',$request->id)
								->update([
									'first_name'=>$request->first_name,
									'middle_name'=>$request->middle_name,
									'last_name'=>$request->last_name,
									'auto_no'=>$request->auto_no,
                                    'driver_photo_name'=>$driver_photo_name,
									'contact_no'=>$request->contact_no
								]);
		 if($result)
            return response()->json(1);
            else
            return response()->json(0);
	
		}

        public function storeFcmTokenDriver(Request $request)
        {

        $result=Add_Driver::where('id','=',$request->driver_id)
                                ->update([
                                    'fcm_token'=>$request->fcm_token,
                                ]);

        if($result)
            return response()->json(1);
            else
            return response()->json(0);
        }

    
}
