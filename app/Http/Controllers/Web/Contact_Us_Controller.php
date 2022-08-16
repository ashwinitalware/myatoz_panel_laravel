<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Contact_Us;
use Illuminate\Support\Facades\DB;

class Contact_Us_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.contact_us') == 1)
            {       
            $All_Contact_Us = Add_Contact_Us::where('deleted_at', NULL)->get();
           
            return view('admin.contactus.index', compact('All_Contact_Us'));
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
            'name' => 'required',
            'contact_no' => 'required',
            'email_id' => 'required',
            'address' => 'required',
            
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'name'=>$data1['name'],
                'contact_no'=>$data1['contact_no'],
                'email_id'=>$data1['email_id'],
                'address'=>$data1['address'],
                'created_at'=>date('Y-m-d H:i:s')
            );

            
            // dd($data);  
            $contactus = Add_Contact_Us::insertGetId($data);
            //dd($area);
            if($contactus) {
                return redirect("contactus")->with('success', 'Contact Us successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("contactus")->with('error', 'Contact Us not added successfully');

        }
    }

    public function destroy($id)
    {
        try
            {
                $data = Add_Contact_Us::find($id)->delete();
                return redirect("contactus")->with('success', 'Contact Us deleted successfully');
            } 
        catch (\Exception $e) 
            {
                return redirect("contactus")->with('error', 'Contact Us not deleted successfully');
            } 
    }
}
