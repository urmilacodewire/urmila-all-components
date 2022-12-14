jo-panel.blade.php<?php

namespace App\Http\Controllers\Admin\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\User;

class ApiController extends Controller
{
   
    public function categoryList()
    {
       $data = DB::table('categories')->where('status',1)->get();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }


    public function subcategoryList()
    {
       $data = DB::table('subcategories')->where('status',1)->get();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }

    public function notificationList()
    {
       $data = DB::table('notifications')->get();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }

    public function timeslotList()
    {
       $data = DB::table('timeslots')->get();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }

    public function joblist($id)
    {
       $data = DB::table('jobs')->where('subcategory_id',$id)->get();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }

    public function jobdetails($id)
    {
       $data = DB::table('jobs')->where('id',$id)->first();
      return response()->json([
        'data'   => $data,
        'status' => 200,
    ]);
    }

    protected function registerApi(Request $req)
    {

        $validate = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails())
        {
            $response = [
                'success' => false,
                'Message' => $validate->errors()
            ];  
          return  response()->json([$response]);
        }
        $input  = $req->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('Job-portal')->plainTextToken;
        $success['name'] = $user->name;
        
        $data = [
            'success' => true,
            'data' => $success,
            'message' =>'User registered Successfully'   
        ];

        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function userPersonalApi(Request $request , $id)
    {
        $validate = Validator::make($request->all(),[
            'name'=> 'required','email'=> 'required', 'phone'=> 'required|digits:10',
            'gendar'=> 'required','dob'=> 'required','state' =>'required','city'=>'required' ,        
            'address'=> 'required',  'pincode' => 'required|digits:6','language'=> 'required'  
        ]);
        
        if($validate->fails())
        {
            $response = [
                'success' => false,
                'Message' => $validate->errors()
            ];  
          return  response()->json([$response]);
        }
        $input = $request->all();
        $values = $input['language'];
        $input = implode(',',$values);
       $personal = DB::table('users')->where('id',$id)->update($input);

    $success['token'] = $personal->createToken('Job-portal')->plainTextToken;
    $success['name'] = $personal->name;
    
    $data = [
        'success' => true,
        'data' => $success,
        'message' =>'User Personal Information updated Successfully'   
    ];

        return response()->json([
            'data' => $data ,
            'status' => 200
        ]);
    }

    public function userEducationApi(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'higherQft'=> 'required',
            'course'=> 'required',
            'coursetype'=> 'required',
            'specialisation'=> 'required',
            'university'=> 'required',
            'passoutyear'=> 'required'
        ]);
        
        if($validate->fails())
        {
            $response = [
                'success' => false,
                'Message' => $validate->errors()
            ];  
          return  response()->json([$response]);
        }
            $input = $request->all();
             $education = DB::table('users')->where('id',$id)->update($input);

            $success['token'] = $education->createToken('Job-portal')->plainTextToken;
            $success['name'] = $education->name;
            
            $data = [
                'success' => true,
                'data' => $success,
                'message' =>'User Education Details updated Successfully'   
            ];

        return response()->json([
            'data' => $data ,
            'status' => 200
        ]);
    }

    public function userSkillsApi(Request $request , $id)
    {
        $validate = Validator::make($request->all(),[
            'skills'=> 'required'
        ]);
        
        if($validate->fails())
        {
            $response = [
                'success' => false,
                'Message' => $validate->errors()
            ];  
          return  response()->json([$response]);
        }
            $input = $request->all();
             $skills = DB::table('users')->where('id',$id)->update($input);

            $success['token'] = $skills->createToken('Job-portal')->plainTextToken;
            $success['name'] = $skills->name;
            
            $data = [
                'success' => true,
                'data' => $success,
                'message' =>'User Key Skills updated Successfully'   
            ];

        return response()->json([
            'data' => $data ,
            'status' => 200
        ]);
    }
}
