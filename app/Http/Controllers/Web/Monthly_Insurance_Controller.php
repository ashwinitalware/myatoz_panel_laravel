<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Monthly_Insurance;
use Illuminate\Support\Facades\DB;


class Monthly_Insurance_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.insurance') == 1)
            {         
            $All_Monthly_Insurance = Add_Monthly_Insurance::where('deleted_at', NULL)->get();
            return view('admin.monthly_insurance.index', compact('All_Monthly_Insurance'));
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
            'monthly_insurance' => 'required',
            
        ]);
        

        try{
            
            //Request is valid, create new data
            $data = Add_Monthly_Insurance::create([
                'monthly_insurance' => $request->monthly_insurance,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
            
            if($data) {                
                return redirect("monthly_insurance")->with('success', 'Monthly Insurance was successfully added');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect("monthly_insurance")->with('error', 'Monthly Insurance not added successfully');
        }
    }

    public function edit($id){
        if(session()->get('login_data.insurance') == 1)
            {
    	$monthly_insurance = Add_Monthly_Insurance::findOrFail($id);
        // dd($user);
        $All_Monthly_Insurance = Add_Monthly_Insurance::where('deleted_at', NULL)->whereNotIn('id', [$id])->get();
        return view('admin.monthly_insurance.edit', compact('monthly_insurance','All_Monthly_Insurance'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'monthly_insurance' => 'required',        
        ]);
        
        $city = Add_Monthly_Insurance::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $subscriptionUpdated = $city->update($data);
            if($subscriptionUpdated) {
                
                return redirect("monthly_insurance")->with('success', 'Monthly Insurance updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("monthly_insurance")->with('error', 'Monthly Insurance not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_Monthly_Insurance::find($id)->delete();
            return redirect("monthly_insurance")->with('success', 'Monthly Insurance deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("monthly_insurance")->with('error', 'Monthly Insurance not deleted successfully');


        } 
    }
}
