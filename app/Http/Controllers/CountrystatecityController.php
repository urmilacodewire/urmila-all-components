<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use DB;

class CountrystatecityController extends Controller
{
    public function index()
    {
       $array =  DB::table('countries')->get()->toArray();
       $array = Country::all()->toArray();
      // dd($array);  

        $data['countries'] = Country::get(["name", "id"]);
        return view('country-state-city-dropdown', $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchState(Request $request)
    {
    	//dd("h");
        $data['states'] = State::where("country_id", $request->country_id)
                                ->get(["state", "id"]);
                             //   dd($request);
        return response()->json($data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                    ->get(["city", "id"]);
                                      
        return response()->json($data);
    }

}
