<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Add_Area;
use App\Models\Add_Customer;
use App\Models\Add_Driver;
use Illuminate\Support\Carbon;
use App\Models\Add_Subscription;
use App\Models\Add_E_Pass;
use App\Models\Booking_Ride;
use App\Models\Driver_Management;

class Dashboard_Controller extends Controller
{
    public function dashboard()
    {
        if(session()->get('login_data.dashboard') == 1)
        {    
        $customers_data = Add_Customer::where('deleted_at', Null)->where('status', 'active')->count();

        $sunscription_expired = DB::table('add_customer')->where('add_customer.deleted_at', NULL)
            ->join('city','city.id','add_customer.city_id')
            ->leftJoin('add_e_pass','add_e_pass.customer_id','add_customer.id')
            ->leftJoin('subscription','subscription.id','add_e_pass.subscription_id')
            ->where('city.deleted_at', NULL)
            ->where('to_date', '<',date('Y-m-d'))
            ->whereNotNull('subscription_type')
            ->count();
        $subsribed = DB::table('add_customer')->where('add_customer.deleted_at', NULL)
            ->join('city','city.id','add_customer.city_id')
            ->leftJoin('add_e_pass','add_e_pass.customer_id','add_customer.id')
            ->leftJoin('subscription','subscription.id','add_e_pass.subscription_id')
            ->where('city.deleted_at', NULL)
            ->where('to_date', '>=',date('Y-m-d'))
            ->whereNotNull('subscription_type')
            ->count();
        $not_subsribed = DB::table('add_customer')->where('add_customer.deleted_at', NULL)
            ->join('city','city.id','add_customer.city_id')
            ->leftJoin('add_e_pass','add_e_pass.customer_id','add_customer.id')
            ->leftJoin('subscription','subscription.id','add_e_pass.subscription_id')
            ->where('city.deleted_at', NULL)
            ->whereNull('subscription_type')
            ->count();
        $total_epass_amount = Add_E_Pass::sum('amount_to_be_paid');

        
        $driver_data = Add_Driver::where('deleted_at', Null)->where('status', 'active')->count();
        $driver_management_data = Add_Driver::where('deleted_at', Null)->where('status', 'active')->get();
        return view('admin.dashboard', compact('customers_data','driver_data','driver_management_data','sunscription_expired','subsribed','not_subsribed','total_epass_amount'));
        }
        else
        return redirect('/');
    }
}
