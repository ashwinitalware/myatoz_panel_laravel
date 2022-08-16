<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Mode_Of_Payment;
use App\Models\Booking_Ride;
use Illuminate\Support\Carbon;
use App\Models\Add_Subscription;
use App\Models\Add_City;
use App\Models\Add_E_Pass;
use App\Models\Add_Customer;
use App\Models\Add_Customer_Nominee;
use App\Models\Add_Monthly_Insurance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class E_Pass_Controller extends Controller
{
    public function index()
    {
      

        try {            
            if(session()->get('login_data.customer') == 1)
            {    
            $All_Customers = Add_Customer::where('deleted_at', NULL)->get();
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->get();
            $All_Insurance = Add_Monthly_Insurance::where('deleted_at', NULL)->first();
            $All_E_Pass = DB::table('add_e_pass')->where('add_e_pass.deleted_at', NULL)->where('city.deleted_at', NULL)
            ->join('add_customer','add_customer.id','add_e_pass.customer_id')
            ->join('city','city.id','add_e_pass.city_id')
            ->join('subscription','subscription.id','add_e_pass.subscription_id')
            ->join('mode_of_payment','mode_of_payment.id','add_e_pass.mode_of_payment_id')
            ->select('add_e_pass.*','city.city as city_name',
            'add_customer.first_name as customer_first_name','add_customer.middle_name as customer_middle_name','add_customer.last_name as customer_last_name','add_customer.contact_no as customer_contact_no',
            'subscription.subscription_type as subscription_name',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->get();



            $latest = Add_E_Pass::latest()->first();
            

                    if (! $latest) {
                        $e_pass_no = 'MYATOZ00001';
                        }
                        else{
                    $string = preg_replace("/[^0-9\.]/", '', $latest->e_pass_no);
                    $e_pass_no =  'MYATOZ' . sprintf('%05d', $string+1);

                        }
            return view('admin.e_pass.index', compact('e_pass_no','All_E_Pass','All_Customers','All_Payments_Mode','All_Cities','All_Insurance'));
            }
            else
            return redirect('/');

        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function store(Request $request)
    {
        

        // try {
            
            

            $data1 = $request->all();
            
            if($request->monthly_insurance_taken == "No")
            {
                $data1['monthly_insurance_amount'] = 0;
            }
            //dd($data1);
            $data=array(
                'customer_id'=>$data1['customer_id'],
                'city_id'=>$data1['city_id'],
                'booking_date'=>$data1['booking_date'],
                'subscription_id'=>$data1['subscription_id'],
                'duration'=>$data1['duration'],
                'monthly_insurance_taken'=>$data1['monthly_insurance_taken'],
                'monthly_insurance_amount'=>$data1['monthly_insurance_amount'],
                'from_date'=>$data1['from_date'],
                'to_date'=>$data1['to_date'],
                'e_pass_no'=>$data1['e_pass_no'],
                'amount_to_be_paid'=>$data1['amount_to_be_paid'],
                'mode_of_payment_id'=>$data1['mode_of_payment_id'],
                'created_at'=>date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $e_pass_generated = Add_E_Pass::insertGetId($data);
            if($request->monthly_insurance_taken == "Yes")
            {
                $e_pass_with_mi = Add_E_Pass::findOrFail($e_pass_generated);
                $data=array(
                    'monthly_insurance_amount'=>$data1['monthly_insurance_amount'],
                );
                $e_passGen = $e_pass_with_mi->update($data);

                $data=array(
                    'customer_id'=>$e_pass_with_mi['customer_id'],
                    'subscription_id'=>$e_pass_with_mi['subscription_id'],
                    'e_pass_id'=>$e_pass_generated,
                    'name'=>$data1['name'],
                    'address'=>$data1['address'],
                    'mobile_number'=>$data1['mobile_number'],
                    'relation_with_customer'=>$data1['relation_with_customer'],
                    'created_at'=>date('Y-m-d H:i:s'),
                );
                $e_pass_insurance = Add_Customer_Nominee::insertGetId($data);
                if($e_passGen) {
                    return redirect("e_pass")->with('success', 'E Pass Generated with insurance Successfully');
                }

            }
            else{
                if($e_pass_generated)
                return redirect("e_pass")->with('success', 'E Pass Generated without insurance Successfully');

            }

            // all good
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     // dd($e);
        //     return redirect("e_pass")->with('error', 'E Pass Not Generated Successfully');

        // }
    }

    public function edit($id){
        if(session()->get('login_data.customer') == 1)
            {  
    	    $e_pass = DB::table('add_e_pass')->where('add_e_pass.deleted_at', NULL)->where('add_e_pass.id', $id)->where('city.deleted_at', NULL)
            ->join('add_customer','add_customer.id','add_e_pass.customer_id')
            ->join('city','city.id','add_e_pass.city_id')
            ->join('subscription','subscription.id','add_e_pass.subscription_id')
            ->join('mode_of_payment','mode_of_payment.id','add_e_pass.mode_of_payment_id')
            ->select('add_e_pass.*','city.city as city_name',
            'add_customer.first_name as customer_first_name','add_customer.middle_name as customer_middle_name','add_customer.last_name as customer_last_name',
            'subscription.subscription_type as subscription_name',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->first();
    	    $All_Customers = Add_Customer::where('deleted_at', NULL)->whereNotIn('id', [$e_pass->customer_id])->get();
            $All_Subscriptions = Add_Subscription::where('deleted_at', NULL)->whereNotIn('id', [$e_pass->subscription_id])->get();
            $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$e_pass->city_id])->get();
            $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->whereNotIn('id', [$e_pass->mode_of_payment_id])->get();
            $All_E_Pass = DB::table('add_e_pass')->where('add_e_pass.deleted_at', NULL)->whereNotIn('add_e_pass.id', [$id])
            ->join('add_customer','add_customer.id','add_e_pass.customer_id')
            ->join('city','city.id','add_e_pass.city_id')
            ->join('subscription','subscription.id','add_e_pass.subscription_id')
            ->join('mode_of_payment','mode_of_payment.id','add_e_pass.mode_of_payment_id')
            ->select('add_e_pass.*','city.city as city_name',
            'add_customer.first_name as customer_first_name','add_customer.middle_name as customer_middle_name','add_customer.last_name as customer_last_name',
            'subscription.subscription_type as subscription_name',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->get();
            return view('admin.e_pass.edit', compact('e_pass','All_E_Pass','All_Customers','All_Subscriptions','All_Payments_Mode','All_Cities'));
        }
        else
        return redirect('/');
        }




    public function update(Request $request, $id)
    {       
        
        
        
        $e_pass = Add_E_Pass::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $e_passUpdated = $e_pass->update($data);
            if($e_passUpdated) {
                
                return redirect("e_pass")->with('success', 'E-Pass updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("e_pass")->with('error', 'E-Pass not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_E_Pass::find($id)->delete();
            return redirect("e_pass")->with('success', 'E-Pass deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("e_pass")->with('error', 'E-Pass not deleted successfully');


        } 
    }
    public function get_customer_details(Request $request)
    {

        try {            
             
            $customer = Add_Customer::where('deleted_at', NULL)->where('id', $request->customer_id)->first();
           
            
            return  response()->json($customer);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function get_subscriptions(Request $request)
    {

        try {            
             
            $subscription = Add_Subscription::where('deleted_at', NULL)->where('city_id', $request->city_id)->get();
           
            
            return  response()->json($subscription);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }


    public function get_subscription_detail(Request $request)
    {

        try {            
             
            $subscription = Add_Subscription::where('deleted_at', NULL)->where('id', $request->subscription_id)->first();
           
            
            return  response()->json($subscription);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
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
