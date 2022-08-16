<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Add_City;
use Illuminate\Http\Request;
use App\Models\Add_Subscription;
use Illuminate\Support\Facades\DB;

class Subscription_Controller extends Controller
{
    public function index()
    {
        try {  
            if(session()->get('login_data.subscription') == 1)
            {             
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            $All_Subscriptions = DB::table('subscription')->where('subscription.deleted_at', NULL)->join('city','city.id','subscription.city_id')
            ->select('subscription.*','city.city as city_name')->get();
            return view('admin.subscription.index', compact('All_Subscriptions','All_Cities'));
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
            'subscription_type' => 'required',
            'duration' => 'required',
            'amount' => 'required',
            
        ]);
        

        try{
            //Request is valid, create new data
            $data = Add_Subscription::create([
                'city_id' => $request->city_id,
                'subscription_type' => $request->subscription_type,
                'duration' => $request->duration,
                'amount' => $request->amount,
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            
            if($data) {                
                return redirect("subscription")->with('success', 'Subscription was successfully added!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect("subscription")->with('error', 'Subscription not added successfully');
        }
    }
    public function edit($id){
        if(session()->get('login_data.subscription') == 1)
            {
    	$subscription = DB::table('subscription')->where('subscription.deleted_at', NULL)->where('subscription.id',$id)->join('city','city.id','subscription.city_id')
        ->select('subscription.*','city.city as city_name')->first();
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$subscription->city_id])->get();

        // dd($user);
        $All_Subscriptions = DB::table('subscription')->where('subscription.deleted_at', NULL)->whereNotIn('subscription.id', [$subscription->id])->join('city','city.id','subscription.city_id')
        ->select('subscription.*','city.city as city_name')->get();
        return view('admin.subscription.edit', compact('subscription','All_Subscriptions','All_Cities'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'subscription_type' => 'required',
            'duration' => 'required',
            'amount' => 'required',            
        ]);
        
        $city = Add_Subscription::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $subscriptionUpdated = $city->update($data);
            if($subscriptionUpdated) {
                
                return redirect("subscription")->with('success', 'Subscription updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("subscription")->with('error', 'Subscription not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_Subscription::find($id)->delete();
            return redirect("subscription")->with('success', 'Subscription deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("subscription")->with('error', 'Subscription not deleted successfully');


        } 
    }

    public function hideSubscription($id,$value)
    {
        // return response()->json($id);
        try{
            $data = Add_Subscription::where('id',$id)->update(['hide'=>$value]);
            return redirect("subscription")->with('success', 'Subscription Hided successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("subscription")->with('error', 'Subscription not deleted successfully');


        } 
    }

}
