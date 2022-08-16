<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mode_Of_Payment;
use App\Models\Add_Subscription;
use App\Models\Add_City;
use App\Models\Add_E_Pass;
use App\Models\Booking_Ride;
use App\Models\Add_Customer;
use App\Models\Add_Monthly_Insurance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Add_Customer_Nominee;
use Validator;

class E_Pass_Controller extends Controller
{
    public function get_customer_e_pass(Request $request)
    {
        
        

        try {         
                $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();
                $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
                $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->sum('added_persons');
                $t = $e_pass_data->duration - $booking_ride_data ;

                $e_passes['e_pass'] = DB::table('add_e_pass')->where('add_e_pass.deleted_at', NULL)->where('add_e_pass.customer_id', $request->customer_id)
                ->join('add_customer','add_customer.id','add_e_pass.customer_id')
                ->join('city','city.id','add_e_pass.city_id')
                ->join('subscription','subscription.id','add_e_pass.subscription_id')
                ->join('mode_of_payment','mode_of_payment.id','add_e_pass.mode_of_payment_id')
                ->select('add_e_pass.*','city.city as city_name','add_customer.contact_no as contact_no','add_customer.aadhar_number as aadhar_number','add_customer.customer_photo_name as customer_photo_name',
                'add_customer.first_name as customer_first_name','add_customer.middle_name as customer_middle_name','add_customer.last_name as customer_last_name',
                'subscription.subscription_type as subscription_name','add_customer.address',
                'mode_of_payment.mode_of_payment as mode_of_payment_name')->latest()->first();
                $parse_date = Carbon::parse($e_passes['e_pass']->from_date);
                $e_passes['to_date'] = $parse_date->addDays($t)->format('Y-m-d');               
                return response()->json($e_passes);
                
            } catch (Exception $e) {
                
                return response()->json(0);
            }
    }


    public function create_e_pass(Request $request)
    {
        // try {
            if($request->insurance == 'No')
            {
            $i_amount = 0;   
            $monthly_insurance_taken = $request->insurance;
            }
            if($request->insurance == 'Yes')
            {    
            $i_amount = $request->monthly_insurance;    
            $monthly_insurance_taken = $request->insurance;
            }
            $subscription_id = Add_Subscription::where('deleted_at', NULL)->where('id',$request->subscription_id)->first();
            $city_id = Add_City::where('deleted_at', NULL)->where('id',$subscription_id->city_id)->first();
            $mode_of_payment_id = Mode_Of_Payment::where('deleted_at', NULL)->first();
            //return response()->json($city_id->id);
            
            $latest = Add_E_Pass::latest()->first();

                    if (! $latest) {
                        $e_pass_no = 'MYATOZ00001';
                        }
                    else{
                        $string = preg_replace("/[^0-9\.]/", '', $latest->e_pass_no);
                        $e_pass_no =  'MYATOZ' . sprintf('%05d', $string+1);

                            }
            $to_date = Carbon::now()->addDays($subscription_id->duration)->format('Y-m-d'); 
            $data=array(
                'customer_id'=> $request->customer_id,
                'city_id'=> $city_id->id,
                'booking_date'=> date("Y-m-d"),
                'subscription_id'=> $subscription_id->id,
                'duration'=> $subscription_id->duration,
                'monthly_insurance_taken'=> $monthly_insurance_taken,
                'monthly_insurance_amount' => $i_amount,
                'from_date'=>date("Y-m-d"),
                'to_date'=> $to_date,
                'e_pass_no'=> $e_pass_no,
                'amount_to_be_paid'=> $request->amount_to_be_paid,
                'mode_of_payment_id'=> $mode_of_payment_id->id,
                'razorpay_order_id'=>$request->razorpay_order_id,
                'created_at'=> date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $e_pass_generated = Add_E_Pass::insertGetId($data);
            
            if($request->insurance == 'Yes'){
            $data1=array(
                'customer_id'=>$request->customer_id,
                'subscription_id'=>$subscription_id->id,
                'e_pass_id'=>$e_pass_generated,
                'name'=>$request->name,
                'address'=>$request->address,
                'mobile_number'=>$request->mobile_number,
                'aadhar_number'=>$request->aadhar_number,
                'relation_with_customer'=>$request->relation_with_customer,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $add_customer_nominee = Add_Customer_Nominee::insertGetId($data1);
            if($add_customer_nominee) {
                return response()->json(1);
            }
            }

            if($e_pass_generated) {
                return response()->json(1);
            }

            //all good
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     // dd($e);
        //     return response()->json(0);

        // }
    }

    public function download_e_pass(Request $request)
    {

        try {         
            $customer_data = Add_Customer::where('deleted_at', Null)->where('id', $request->customer_id)->first();
            $e_pass_data = Add_E_Pass::where('deleted_at', Null)->where('customer_id', $customer_data->id)->latest()->first();
            $booking_ride_data = Booking_Ride::where('deleted_at', Null)->where('customer_epass_id', $e_pass_data->id)->sum('added_persons');
            $t = $e_pass_data->duration - $booking_ride_data ;

            $e_passes['e_pass'] = DB::table('add_e_pass')->where('add_e_pass.deleted_at', NULL)->where('add_e_pass.customer_id', $request->customer_id)
            ->join('add_customer','add_customer.id','add_e_pass.customer_id')
            ->join('city','city.id','add_e_pass.city_id')
            ->join('subscription','subscription.id','add_e_pass.subscription_id')
            ->join('mode_of_payment','mode_of_payment.id','add_e_pass.mode_of_payment_id')
            ->select('add_e_pass.*','city.city as city_name','add_customer.contact_no as contact_no','add_customer.aadhar_number as aadhar_number','add_customer.customer_photo_name as customer_photo_name',
            'add_customer.first_name as customer_first_name','add_customer.middle_name as customer_middle_name','add_customer.last_name as customer_last_name',
            'subscription.subscription_type as subscription_name','add_customer.address',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->latest()->first();
            $parse_date = Carbon::parse($e_passes['e_pass']->from_date);
            $e_passes['to_date'] = $parse_date->addDays($t)->format('Y-m-d');               
            return view("admin.E-Pass",compact('e_passes','customer_data','e_pass_data'));
            
        } catch (Exception $e) {
            
            return response()->json(0);
        }
    }
}
