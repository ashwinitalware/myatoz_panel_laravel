<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mode_Of_Payment;
use App\Models\Add_City;
use App\Models\Add_Area;
use App\Models\Add_Driver;
use App\Models\Driver_Management;
use App\Models\Driver_Substop;
use Validator;
class Driver_Management_Controller extends Controller
{
    public function index()
    {

        try {            
            if(session()->get('login_data.driver') == 1)
            {      
            $All_Drivers = Add_Driver::where('deleted_at', NULL)->get();
            $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->get();
            $All_Cities = Add_City::where('deleted_at', NULL)->get();

            $All_Driver_Management = Driver_Management::with('pickup_details','drop_details')->where('driver_management.deleted_at', NULL)
            ->join('add_driver','add_driver.id','driver_management.driver_id')
            ->join('city','city.id','driver_management.city_id')
            ->join('mode_of_payment','mode_of_payment.id','driver_management.mode_of_payment_id')
            ->select('driver_management.*','city.city as city_name',
            'add_driver.first_name as driver_first_name','add_driver.middle_name as driver_middle_name','add_driver.last_name as driver_last_name',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->get();
            //return response()->json($All_Driver_Management);
            //dd($All_Driver_Management);

            return view('admin.driver_management.index', compact('All_Driver_Management','All_Drivers','All_Payments_Mode','All_Cities'));
        }
        else
        return redirect('/');
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
    
    public function store(Request $request)
    {
        
        // $validator = $request->validate([
        //     'driver_id' => 'required|unique:driver_management',
        //     'city_id' => 'required',
        //     'amount_per_km' => 'required',
        //     'route_running_on' => 'required',
        //     'mode_of_payment_id' => 'required',
        // ]);
            

            
    //    return response()->json($validator);
        
        try {
            
            $data1 = $request->all();
            //dd($data1);
            
            $data=array(
                'driver_id'=>$data1['driver_id'],
                'city_id'=>$data1['city_id'],
                'amount_per_km'=>$data1['amount_per_km'],
                'area_id'=>$data1['area_id'],
                'to_area_id'=>$data1['to_area_id'],
                'mode_of_payment_id'=>$data1['mode_of_payment_id'],
                'created_at'=>date('Y-m-d H:i:s'),
            );

            //dd($data);  
            $driver_management_id = Driver_Management::insertGetId($data);
            

            if($driver_management_id) {
                for ($i=0; $i <count($request->substops) ; $i++) { 
                    Driver_Substop::create(
                        [
                            'driver_id'=>$request->driver_id,
                            'subStop_id'=>$request->substops[$i],
                        ]
                    );
                }
                return redirect("driver_management")->with('success', 'Driver Management successfully added!');
            }

            //all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("driver_management")->with('error', 'Driver Managements not added successfully');

        }
    }


    public function edit($id){
        if(session()->get('login_data.driver') == 1)
        {      
        $driver_management = DB::table('driver_management')->where('driver_management.deleted_at', NULL)->where('driver_management.id', $id)
        ->join('add_driver','add_driver.id','driver_management.driver_id')
        ->join('city','city.id','driver_management.city_id')
        ->join('mode_of_payment','mode_of_payment.id','driver_management.mode_of_payment_id')
        ->select('driver_management.*','city.city as city_name',
        'add_driver.first_name as driver_first_name','add_driver.middle_name as driver_middle_name','add_driver.last_name as driver_last_name',
        'mode_of_payment.mode_of_payment as mode_of_payment_name', DB::raw('(select group_concat(subStop_id) from driver_substops where driver_id=driver_management.driver_id) as subStop_id'))->first();
        $All_Areas = Add_Area::where('deleted_at', NULL)->where('city_id',$driver_management->city_id)->get();
        
        $All_Driver_Management = Driver_Management::with('pickup_details','drop_details')->where('driver_management.deleted_at', NULL)->whereNotIn('driver_management.id', [$id])
            ->join('add_driver','add_driver.id','driver_management.driver_id')
            ->join('city','city.id','driver_management.city_id')
            ->join('mode_of_payment','mode_of_payment.id','driver_management.mode_of_payment_id')
            ->select('driver_management.*','city.city as city_name',
            'add_driver.first_name as driver_first_name','add_driver.middle_name as driver_middle_name','add_driver.last_name as driver_last_name',
            'mode_of_payment.mode_of_payment as mode_of_payment_name')->get();
        
        $All_Drivers = Add_Driver::where('deleted_at', NULL)->whereNotIn('id', [$driver_management->driver_id])->get();
        $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->whereNotIn('id', [$driver_management->mode_of_payment_id])->get();
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$driver_management->city_id])->get();
            
        return view('admin.driver_management.edit', compact('All_Areas','driver_management','All_Driver_Management','All_Drivers','All_Payments_Mode','All_Cities'));
    }
    else
    return redirect('/');
    }

    public function update(Request $request, $id)
    {           
        
        $driver_management = Driver_Management::findOrFail($id);
        $driver_details = Add_Driver::findOrFail($driver_management->driver_id);
        //return response()->json($driver_details);

        try {
            
            $data = $request->all();
            //dd($data);
            $data1 = array(
                "city_id" => $request->city_id
            );

            $DriverManagementUpdated = $driver_management->update($data);
            $DrivertUpdated = $driver_details->update($data1);
            
            if($DriverManagementUpdated) {
                Driver_Substop::where('driver_id',$driver_management->driver_id)->delete();

                for ($i=0; $i <count($request->substops) ; $i++) { 
                    Driver_Substop::create(
                        [
                            'driver_id'=>$driver_management->driver_id,
                            'subStop_id'=>$request->substops[$i],
                        ]
                    );
                }
                return redirect("driver_management")->with('success', 'Driver Management successfully added!');
            }

            if($DriverManagementUpdated) {
                
                return redirect("driver_management")->with('success', 'Driver Management updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("driver_management")->with('error', 'Driver Management not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }


    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Driver_Management::find($id)->delete();
            return redirect("driver_management")->with('success', 'Driver Management deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("driver_management")->with('error', 'Driver Management not deleted successfully');


        } 
    }


    public function get_driver_details(Request $request)
    {

        try {            
             
            $driver = Add_Driver::where('deleted_at', NULL)->where('id', $request->driver_id)->first();
           
            
            return  response()->json($driver);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function get_area_details(Request $request)
    {

        try {            
             
            $areas = Add_Area::where('deleted_at', NULL)->where('city_id', $request->city_id)->get();
           
            
            return  response()->json($areas);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }

    public function get_drivers(Request $request)
    {

        try {            
             
            $driver = Add_Driver::where('deleted_at', NULL)->where('city_id', $request->city_id)->get();
           
            
            return  response()->json($driver);

            
        } catch (Exception $e) {
            
            return response()->json("Something Went Wrong");
        }
    }
}
