<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Add_Customer;
use App\Models\Add_E_Pass;
use App\Models\Add_Customer_Nominee;
use Illuminate\Http\Request;
use Hash;
use DB;
class UserController extends Controller
{
    public function login_customer(Request $request)
    {

        $data = Add_Customer::where('user_id',$request->user_id)->where('deleted_at', NULL)->first();
        if($data)
        $customer = Hash::check(request('password'), $data->password);
        else
        return response()->json(['status'=>201]);

        if($customer)
        return response()->json(['data'=>$data,'status'=>200]);
        else
        return response()->json(['status'=>202]);
        
    }

    public function customer_data(Request $request)
    {
        

        $data = Add_Customer::where('id',$request->customer_id)->where('deleted_at', NULL)->first();
       
     
        if($data)
        return response()->json($data);
        else
        return response()->json(0);
        
    }

    public function register_customer(Request $request)
    {
        

        $data = Add_Customer::where('user_id',$request->user_id)->first();

        if($data)
            return response()->json(0);
            else{
                $data = Add_Customer::where('contact_no',$request->contact_no)->first();

                    if($data)
                        return response()->json(2);
                    else
                        {
                        try {
                                $data1 = $request->all();
                                //dd($data1);
                                //return response()->json($data1);
            
                                $data=array(
                                'city_id'=>$data1['city_id'],
                                'first_name'=>$data1['first_name'],
                                'middle_name'=>$data1['middle_name'],
                                'last_name'=>$data1['last_name'],
                                'user_id'=>$data1['user_id'],
                                'gender'=>$data1['gender'],
                                'password'=>Hash::make($data1['password']),
                                'aadhar_number'=>$data1['aadhar_number'],
                                'address'=>$data1['address'],
                                'contact_no'=>$data1['contact_no'],
                                'terms_cond'=>'accepted',
                                'nominee_details'=>NULL,
                                'created_at'=>date('Y-m-d H:i:s'),
                                );

                                if($request->customer_photo_name) {
                                $image =  base64_decode($request->customer_photo_name);
                                $imageName = time().'.'.$request->ext1;

                                file_put_contents(public_path() . '/uploads/customer_photos/user/' . $imageName, $image);
                                
                                $image = 'uploads/customer_photos/user/'.$imageName;
                                $data['customer_photo_name'] = $image;
                                }

                                // if($request->hasFile('customer_photo_name')) {
                                // $image =  $request->file('customer_photo_name');
                                // $imageName = time().'.'.$image->getClientOriginalExtension();

                                // $imagePath = '/uploads/customer_photos/user/';
                                // $uploaded = $image->move(public_path($imagePath), $imageName);

                                // if($uploaded) {
                                // $image = 'uploads/customer_photos/user/'.$imageName;
                                // $data['customer_photo_name'] = $image;
                                // }
                                // else
                                // {
                                // $data['customer_photo_name'] = '';
                                // }
                                // }

                                // if($request->hasFile('aadhar_photo_name')) {
                                //     $image =  $request->file('aadhar_photo_name');
                                //     $imageName = time().'.'.$image->getClientOriginalExtension();
    
                                //     $imagePath = '/uploads/customer_aadhar_photos/user/';
                                //     $uploaded = $image->move(public_path($imagePath), $imageName);
    
                                //     if($uploaded) {
                                //     $image = 'uploads/customer_aadhar_photos/user/'.$imageName;
                                //     $data['aadhar_photo_name'] = $image;
                                //     }
                                //     else
                                //     {
                                //     $data['aadhar_photo_name'] = '';
                                //     }
                                // }
                                if($request->aadhar_photo_name) {
                                $image2 =  base64_decode($request->aadhar_photo_name);
                                $imageName2 = time().'.'.$request->ext2;

                                file_put_contents(public_path() . '/uploads/customer_aadhar_photos/user/' . $imageName2, $image2);
 
                                $image2 = 'uploads/customer_aadhar_photos/user/'.$imageName2;
                                $data['aadhar_photo_name'] = $image2;
                                }
                                //dd($data);  
                                $customer = Add_Customer::insertGetId($data);
                                //dd($customer);  
                                if($customer) {
                                $data = Add_Customer::where('user_id',$request->user_id)->where('deleted_at', NULL)->first();
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

    public function forget_password_customer(Request $request)
    {
        $customer = Add_Customer::where('user_id',$request->user_id)->first();
        if($customer){
        $data1=array(
            'password'=>Hash::make($request->password),
            'updated_at'=>date('Y-m-d H:i:s'),  
        );

        $data = Add_Customer::where('id', [$customer->id])->update($data1);
        if($data)
        return response()->json(1);
        else
        return response()->json(0);
        }
        else
        {
        return response()->json(2);

        }
    }

    public function get_nominee_details(Request $request)
    {
        $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();
        $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
        if($e_pass_data->monthly_insurance_taken == 'No')
        return response()->json(0);
        else{
        $nominee_data = Add_Customer_Nominee::where('deleted_at', Null)->where('customer_id', $request->customer_id)->where('e_pass_id', $e_pass_data->id)->first();
        return response()->json($nominee_data);
        }
    }
    public function update_nominee_details(Request $request){

        $nominee_details = Add_Customer_Nominee::findOrFail($request->customer_id);
        $data1 = $request->all();
        $data=array(
            'name'=>$data1['name'],
            'address'=>$data1['address'],
            'mobile_number'=>$data1['mobile_number'],
            'relation_with_customer'=>$data1['relation_with_customer'],
            'updated_at'=>date('Y-m-d H:i:s'),
            );
        
        $nomineeUpdated = $nominee_details->update($data);
        if($nomineeUpdated)
        return response()->json(1);
        else
        return response()->json(0);

    }
	public function editcustomer(Request $request){
		$user=Add_Customer::find($request->id);
		
		 if($user->id)
        return response()->json($user);
        else
        return response()->json(0);
		
	}
	
	public function update_customer(Request $request){

        if($request->customer_photo_name_edit) {
                                $image =  base64_decode($request->customer_photo_name_edit);
                                $imageName = time().'.'.$request->ext1;

                                file_put_contents(public_path() . '/uploads/customer_photos/user/' . $imageName, $image);
                                
                                $image = 'uploads/customer_photos/user/'.$imageName;
                                $customer_photo_name = $image;
                                }
                                else
                                {
                                $customer_photo_name = $request->customer_photo_name;

                                }

		$user=Add_Customer::where('id','=',$request->id)
							->update([
								'first_name'=>$request->first_name,
								'middle_name'=>$request->middle_name,
								'last_name'=>$request->last_name,
								'contact_no'=>$request->contact_no,
                                'customer_photo_name'=>$customer_photo_name,
								'address'=>$request->address
								]);
		
		 if($user)
        return response()->json(1);
        else
        return response()->json(0);
	}
    public function storeCustomerFcm(Request $request)
    {
        $res=Add_Customer::where('id','=',$request->customer_id)
                            ->update([
                                'fcm_token'=>$request->fcm_token,
                                ]);
                if($res)
                {
                    return json_encode(true);
                }
                else
                {
                    return json_encode(false);

                }
    }
}
