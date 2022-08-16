<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_City;
use App\Models\Add_Customer;
use App\Models\Add_Monthly_Insurance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class Customer_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.customer') == 1)
            {      
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            $All_Customers = DB::table('add_customer')->where('add_customer.deleted_at', NULL)->where('city.deleted_at', NULL)
            ->join('city','city.id','add_customer.city_id')
            ->select('add_customer.*','city.city as city_name')
            ->orderBy('add_customer.id','DESC')
            ->get();
            
            return view('admin.customer_registration.index', compact('All_Cities','All_Customers',));
        }
        else
        return redirect('/');
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'user_id' => 'required|unique:add_customer',
            'contact_no' => 'required|unique:add_customer|digits:10',
            'password' => 'min:8|required',
            'customer_photo_name' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'aadhar_photo_name' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
       
       


       // dd('askcn'); 
        try {
            
            $data1 = $request->all();
            //dd($data1);
            
            $data=array(
                'city_id'=>$data1['city_id'],
                'first_name'=>$data1['first_name'],
                'middle_name'=>$data1['middle_name'],
                'last_name'=>$data1['last_name'],
                'user_id'=>$data1['user_id'],
                'password'=>Hash::make($data1['password']),
                'aadhar_number'=>$data1['aadhar_number'],
                'address'=>$data1['address'],
                'contact_no'=>$data1['contact_no'],
                'nominee_details'=>$data1['nominee_details'],
                'daily_limit'=>$data1['daily_limit'],
                'created_at'=>date('Y-m-d H:i:s'),
            );

            if(isset($data1['customer_photo_name']) && !empty($data1['customer_photo_name'])) {
                $image =  $data1['customer_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();

                $imagePath = '/uploads/customer_photos/user/';
                $uploaded = $image->move(public_path($imagePath), $imageName);

                if($uploaded) {
                    $image = 'uploads/customer_photos/user/'.$imageName;
                    $data['customer_photo_name'] = $image;
                }
            }
            if(isset($data1['aadhar_photo_name']) && !empty($data1['aadhar_photo_name'])) {
                $image =  $data1['aadhar_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();

                $imagePath = '/uploads/customer_aadhar_photos/user/';
                $uploaded = $image->move(public_path($imagePath), $imageName);

                if($uploaded) {
                    $image = 'uploads/customer_aadhar_photos/user/'.$imageName;
                    $data['aadhar_photo_name'] = $image;
                }
            }
            //dd($data);  
            $customer = Add_Customer::insertGetId($data);
              
            if($customer) {
                return redirect("customer_registration")->with('success', 'Customer successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("customer_registration")->with('error', 'Customer not successfully added');

        }
    }

    public function edit($id){
        if(session()->get('login_data.customer') == 1)
            {
        $customer = DB::table('add_customer')->where('add_customer.deleted_at', NULL)->where('add_customer.id', $id)->join('city','city.id','add_customer.city_id')
        ->select('add_customer.*','city.id as city_id','city.city as city_name')->first();
        $All_Customers = DB::table('add_customer')->where('add_customer.deleted_at', NULL)->where('city.deleted_at', NULL)
        ->whereNotIn('add_customer.id', [$customer->id])->join('city','city.id','add_customer.city_id')
        ->select('add_customer.*','city.city as city_name')->get();
            ;
            //dd($customer);
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$customer->city_id])->get();
       
        
        return view('admin.customer_registration.edit', compact('customer','All_Customers','All_Cities'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       

        $validator = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'user_id' => 'required|unique:add_customer,user_id,' . $id,
            'contact_no' => 'required|digits:10|unique:add_customer,contact_no,' . $id,
            'customer_photo_name' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'aadhar_photo_name' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $customer = Add_Customer::findOrFail($id);

        try {
            $data1 = $request->all();
            if(isset($request->customer_photo_name) ) {
                $image =  $data1['customer_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();
    
                $imagePath = '/uploads/customer_photos/user/';
                $uploaded = $image->move(public_path($imagePath), $imageName);
    
                if($uploaded) {
                    $image = 'uploads/customer_photos/user/'.$imageName;
                    $data1['customer_photo_name'] = $image;
                }
            }
            else{
            unset($data1['customer_photo_name']);
            }

            if(isset($request->aadhar_photo_name)){
                $image =  $data1['aadhar_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();
    
                $imagePath = '/uploads/customer_aadhar_photos/user/';
                $uploaded = $image->move(public_path($imagePath), $imageName);
    
                if($uploaded) {
                    $image = 'uploads/customer_aadhar_photos/user/'.$imageName;
                    $data1['aadhar_photo_name'] = $image;
                }
            }
            else{
            unset($data1['aadhar_photo_name']);
            }

            //dd($data1);
            $customerUpdated = $customer->update($data1);
            if($customerUpdated) {
                
                return redirect("customer_registration")->with('success', 'Customer updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("customer_registration")->with('error', 'Customer not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }
    
    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_Customer::find($id)->delete();
            return redirect("customer_registration")->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("customer_registration")->with('error', 'Customer not deleted successfully');


        } 
    }
    public function customer_notifications()
    {
        return view('admin/customer_notifications');

    }
    public function sendNotificationToCustomers(Request $request)
    {
        $ids=Add_Customer::where('add_customer.deleted_at', NULL)
                            ->whereNotNULL('add_customer.fcm_token')
                            ->pluck('fcm_token')->all();
        $firebaseToken = $ids;
          
        $SERVER_API_KEY = 'AAAAKldpvmw:APA91bEgrY15-ewsFIqe03-SD-v7r820MbdbIykGGHoIed7HCQk0HB_J_A10fGscyvdX9QQC4sTa2ZbMKDJ0mbZKjpvVIqQ9C8NJuJ7zW-TAFZChCMOQE7Dt5cPQnQJ8vYCjbQ5gHaGP';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->message,  
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
               
        $response = curl_exec($ch);
  
        $response=json_decode($response);
        if($response->success)
        {
            return redirect("customer_notifications")->with('success', 'Notification sent successfully !');
        }
        else
        {
            return redirect("customer_notifications")->with('error', 'Customer not deleted successfully');
        }
            

    }
}
