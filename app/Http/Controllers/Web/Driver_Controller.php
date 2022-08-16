<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Add_City;
use App\Models\Add_Driver;
use Illuminate\Support\Facades\Hash;

class Driver_Controller extends Controller
{


    public function index()
    {
        try {   
            if(session()->get('login_data.driver') == 1)
            {         
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            $All_Drivers = DB::table('add_driver')->where('add_driver.deleted_at', NULL)->where('city.deleted_at', NULL)
            ->join('city','city.id','add_driver.city_id')
            ->select('add_driver.*','city.city as city_name')
            ->get();
            
            return view('admin.driver_registration.index', compact('All_Drivers','All_Cities'));
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
            'city_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'auto_no' => 'required|unique:add_driver',
            'auto_insurance_validity_expire_date' => 'required',
            'user_id' => 'required|unique:add_driver',
            'password' => 'min:8|required',
            'address' => 'required',
            'contact_no' => 'required|digits:10|unique:add_driver',
            'driver_photo_name' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'driver_aadhar_photo_name' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        

        try {
            $latest = Add_Driver::latest()->first();

                if (! $latest) 
                {
                    $driver_unique_no = 'MYATOZD00001';
                }
                else
                {
                    $string = preg_replace("/[^0-9\.]/", '', $latest->driver_unique_no);
                    $driver_unique_no =  'MYATOZD' . sprintf('%06d', $string+1);

                }

            $data1 = $request->all();
            //dd($data1);
            
            $data=array(
                'city_id'=>$data1['city_id'],
                'first_name'=>$data1['first_name'],
                'middle_name'=>$data1['middle_name'],
                'last_name'=>$data1['last_name'],
                'auto_no'=>$data1['auto_no'],
                'auto_insurance_validity_expire_date'=>$data1['auto_insurance_validity_expire_date'],
                'driver_unique_no'=>$driver_unique_no,
                'user_id'=>$data1['user_id'],
                'password'=>Hash::make($data1['password']),
                'address'=>$data1['address'],
                'contact_no'=>$data1['contact_no'],
                'account_holder_name'=>$data1['account_holder_name'],
                'account_number'=>$data1['account_number'],
                'ifsc_code'=>$data1['ifsc_code'],
                'bank_name'=>$data1['bank_name'],
                'nominee_details'=>$data1['nominee_details'],
                'created_at'=>date('Y-m-d H:i:s')
            );

            if(isset($data1['driver_photo_name']) && !empty($data1['driver_photo_name'])) {
                $image =  $data1['driver_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();

                $imagePath = '/uploads/drivers_photo/driver/';
                $uploaded = $image->move(public_path($imagePath), $imageName);

                if($uploaded) {
                    $image = 'uploads/drivers_photo/driver/'.$imageName;
                    $data['driver_photo_name'] = $image;
                }
            }
            if(isset($data1['driver_aadhar_photo_name']) && !empty($data1['driver_aadhar_photo_name'])) {
                $image =  $data1['driver_aadhar_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();

                $imagePath = '/uploads/driver_photos/drivers_aadhar_photos/';
                $uploaded = $image->move(public_path($imagePath), $imageName);

                if($uploaded) {
                    $image = 'uploads/driver_photos/drivers_aadhar_photos/'.$imageName;
                    $data['driver_aadhar_photo_name'] = $image;
                }
            }
            //dd($data);  
            $driver = Add_Driver::insertGetId($data);
            //dd($driver);  
            if($driver) {
                return redirect("driver_registration")->with('success', 'Driver successfully added!');
            }

           
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("driver_registration")->with('error', 'Driver  not added successfully');

        }
    }

    public function edit($id){
        if(session()->get('login_data.driver') == 1)
            {
        $driver = DB::table('add_driver')->where('add_driver.deleted_at', NULL)->where('city.deleted_at', NULL)->where('add_driver.id', [$id])
        ->join('city','city.id','add_driver.city_id')
        ->select('add_driver.*','city.city as city_name')
        ->first();
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$driver->city_id])->get();
    	$All_Drivers = Add_Driver::where('deleted_at', NULL)->whereNotIn('id', [$id])->get();
            ;
            //dd($customer);       
        
        return view('admin.driver_registration.edit', compact('driver','All_Drivers','All_Cities'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       

        $validator = $request->validate([
            'city_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'auto_no' => 'required|unique:add_driver,auto_no,' . $id,
            'auto_insurance_validity_expire_date' => 'required',
            'user_id' => 'required|unique:add_driver,user_id,' . $id,
            'address' => 'required',
            'contact_no' => 'required|digits:10|unique:add_driver,contact_no,' . $id,
            'driver_photo_name' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'driver_aadhar_photo_name' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $driver = Add_Driver::findOrFail($id);

        try {
            $data1 = $request->all();
            if(isset($request->driver_photo_name) ) {
                $image =  $data1['driver_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();
    
                $imagePath = '/uploads/drivers_photo/driver/';
                $uploaded = $image->move(public_path($imagePath), $imageName);
    
                if($uploaded) {
                    $image = 'uploads/drivers_photo/driver/'.$imageName;
                    $data1['driver_photo_name'] = $image;
                }
            }
            else{
            unset($data1['driver_photo_name']);
            }

            if(isset($request->driver_aadhar_photo_name)){
                $image =  $data1['driver_aadhar_photo_name'];
                $imageName = time().'.'.$image->getClientOriginalExtension();
    
                $imagePath = '/uploads/driver_photos/drivers_aadhar_photos/';
                $uploaded = $image->move(public_path($imagePath), $imageName);
    
                if($uploaded) {
                    $image = 'uploads/driver_photos/drivers_aadhar_photos/'.$imageName;
                    $data1['driver_aadhar_photo_name'] = $image;
                }
            }
            else{
            unset($data1['driver_aadhar_photo_name']);
            }

            //dd($data1);
            $driverUpdated = $driver->update($data1);
            if($driverUpdated) {
                
                return redirect("driver_registration")->with('success', 'Driver updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("driver_registration")->with('error', 'Driver not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_Driver::find($id)->delete();
            return redirect("driver_registration")->with('success', 'Driver deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("driver_registration")->with('error', 'Driver not deleted successfully');


        } 
    }

    public function changeStatus(Request $request)
    {
        $user = Add_Driver::find($request->faqs_id);
        $user->status = $request->status;
        $user->save();
        if($user)
        return redirect("driver_registration")->with('success', 'Status change successfully');

        else
        return redirect("driver_registration")->with('error', 'Status not change successfully.');


    }

    public function qr_code_driver(Request $request)
    {
        $driver = Add_Driver::find($request->id);
        
        if($driver)
        return view("admin.Driver_QR_Code",compact('driver'));

        else
        return redirect("driver_registration")->with('error', 'Data not Found.');


    }
}
