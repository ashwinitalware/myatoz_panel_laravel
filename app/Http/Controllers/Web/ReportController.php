<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Add_City;
use App\Models\Driver_Daily_Meter_Details;
use App\Models\Add_Driver;
use App\Models\Add_E_Pass;
use App\Models\Booking_Ride;
use App\Models\Add_Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{


    public function driver_login_logout_report(Request $request)
    {
        try 
        {

            // if(session()->get('login_data.driver') == 1)
            // {         
        if($request->from_date)
        {
            $All_Drivers = Add_Driver::where('add_driver.deleted_at', NULL)->where('city.deleted_at', NULL)
                    ->join('city','city.id','add_driver.city_id')
                    ->select('add_driver.*','city.city as city_name')
                    ->get();
                    foreach($All_Drivers as $data)
                    {
                        $data['dailyLoginDetails']=Driver_Daily_Meter_Details::where('login_day_date','>=',$request->from_date)->where('login_day_date','<=',$request->to_date)->where('driver_id',$data->id)->orderBy('id','DESC')->get();

                        $data['total_km']=$data['dailyLoginDetails']->sum('total_run_km');
                        $data['total_hrs']=$data['dailyLoginDetails']->sum('total_hrs');
                    }
        }
        else
        {
            $All_Drivers=[];
        }
            
            return view('admin.reports.driver_login_logout_report', compact('All_Drivers'));
        // }
        // else
        // return redirect('/');
        }
        catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }


    public function customers_subscription_details(Request $request,$status)
    {
        try 
        {
            $data['customers'] = DB::table('add_customer')->where('add_customer.deleted_at', NULL)
            ->join('city','city.id','add_customer.city_id')
            ->leftJoin('add_e_pass','add_e_pass.customer_id','add_customer.id')
            ->leftJoin('subscription','subscription.id','add_e_pass.subscription_id')
            ->where('city.deleted_at', NULL);
            if($request->status=='Subsription Expired')
            {
                $data['customers'] =$data['customers']->where('to_date', '<',date('Y-m-d'));
                $data['customers'] =$data['customers']->whereNotNull('subscription_type');
            }
            if($request->status=='Subsribed')
            {
                $data['customers'] =$data['customers']->where('to_date', '>=',date('Y-m-d'));
                $data['customers'] =$data['customers']->whereNotNull('subscription_type');
            }
            if($request->status=='Not Subscribed')
            {
                $data['customers'] =$data['customers']->whereNull('subscription_type');
            }
            $data['customers'] =$data['customers']->select('city.city as city_name',
            'add_customer.*','subscription.subscription_type as subscription_name','add_e_pass.booking_date','add_e_pass.monthly_insurance_amount','add_e_pass.duration','add_e_pass.from_date','add_e_pass.to_date','add_e_pass.e_pass_no','add_e_pass.amount_to_be_paid')->get();
// dd($data['customers']);
            return view('admin.reports.customers_subscription_details', $data);
        
        }
        catch (Exception $e) 
        {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function current_rides()
    {
        $data['all_rides'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')
                ->where('deleted_at', Null)
                ->where('ride_booking_date',date('Y-m-d'))
                ->whereIn('status',['active','midactive'])
                ->orderBy('id','DESC')
                ->get();

                return view('admin.reports.current_rides',$data); 
    }

    public function completed_rides()
    {
        $data['all_rides'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')
                ->where('deleted_at', Null)
                ->whereIn('status',['inactive'])
                ->orderBy('id','DESC')
                ->get();

                return view('admin.reports.completed_rides',$data); 
    }

    public function cancelled_rides()
    {
        $data['all_rides'] = Booking_Ride::with('pickup_details','dropoff_details','driver_details','customer_details')
                ->where('deleted_at', Null)
                ->whereIn('status',['deactive'])
                ->orderBy('id','DESC')
                ->get();

                return view('admin.reports.cancelled_rides',$data); 
    }


    
}
