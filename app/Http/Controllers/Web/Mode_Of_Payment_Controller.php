<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mode_Of_Payment;
use Illuminate\Support\Facades\DB;


class Mode_Of_Payment_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.payment') == 1)
            {     
            $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->get();
            return view('admin.mode_of_payment.index', compact('All_Payments_Mode'));
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
            'mode_of_payment' => 'required',            
        ]);
        

        try{
            //Request is valid, create new data
            $data = Mode_Of_Payment::create([
                'mode_of_payment' => $request->mode_of_payment,
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            
            if($data) {                
                return redirect("mode_of_payment")->with('success', 'Mode Of Payment was successfully added');
            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect("mode_of_payment")->with('error', 'Mode Of Payment not added successfully');
        }
    }

    public function edit($id){
        if(session()->get('login_data.payment') == 1)
            {  
    	$mode_of_payment = Mode_Of_Payment::findOrFail($id);
        // dd($user);
        $All_Payments_Mode = Mode_Of_Payment::where('deleted_at', NULL)->whereNotIn('id', [$id])->get();
        return view('admin.mode_of_payment.edit', compact('mode_of_payment','All_Payments_Mode'));
            }
            else
            return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'mode_of_payment' => 'required',          
        ]);
        
        $city = Mode_Of_Payment::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $subscriptionUpdated = $city->update($data);
            if($subscriptionUpdated) {
                
                return redirect("mode_of_payment")->with('success', 'Mode Of Payment updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("mode_of_payment")->with('error', 'Mode Of Payment not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Mode_Of_Payment::find($id)->delete();
            return redirect("mode_of_payment")->with('success', 'Mode Of Payment deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("mode_of_payment")->with('error', 'Mode Of Payment not deleted successfully');


        } 
    }
}
