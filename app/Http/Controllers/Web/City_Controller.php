<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_City;
use Illuminate\Support\Facades\DB;


class City_Controller extends Controller
{
    public function index()
    {
        try {            
            if(session()->get('login_data.city') == 1)
            {      
            $All_Cities = Add_City::where('deleted_at', NULL)->get();
            return view('admin.city.index', compact('All_Cities'));
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
            'city' => 'required',
            
        ]);
        

        try {
            
            $data1 = $request->all();
            // dd($data1);
            $data=array(
                'city'=>$data1['city'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            
            // dd($data);  
            $area = Add_City::insertGetId($data);

            if($area) {
                return redirect("city")->with('success', 'City successfully added!');
            }

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect("city")->with('error', 'City not added successfully');

        }
    }

    public function edit($id){
        if(session()->get('login_data.city') == 1)
        {
    	$cities = Add_City::findOrFail($id);
        // dd($user);
        $All_Cities = Add_City::where('deleted_at', NULL)->whereNotIn('id', [$id])->get();
        return view('admin.city.edit', compact('cities','All_Cities'));
        }
        else
        return redirect('/');
    }

    public function update(Request $request, $id)
    {       
        
        $validator = $request->validate([
            'city' => 'required',            
        ]);
        
        $city = Add_City::findOrFail($id);


        try {
            
            $data = $request->all();
            // dd($data);

            $cityUpdated = $city->update($data);
            if($cityUpdated) {
                
                return redirect("city")->with('success', 'City updated successfully');
            }
           
        } catch (\Exception $e) {
                DB::rollback();
                return redirect("city")->with('error', 'City not updated successfully');

            
            // return $this->sendError($e->getMessage(), []);
        }
    }

    public function destroy($id)
    {
        // return response()->json($id);
        try{
            $data = Add_City::find($id)->delete();
            return redirect("city")->with('success', 'City deleted successfully');
        } catch (\Exception $e) {
            // return redirect("page_url_for_message")->with('error', 'Page was not Deleted!');
            return redirect("city")->with('error', 'City not deleted successfully');


        } 
    }
}
