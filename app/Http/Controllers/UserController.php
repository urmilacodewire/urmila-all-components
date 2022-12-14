<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Session;
    
class UserController extends Controller
{
   
    public function index(Request $request)
    {
        //$data = User::orderBy('id','DESC')->paginate(5);

         //////////////
        $data['data'] = User::all();
         if ($request->ajax()) {
            return Datatables::of($data)
                      ->addIndexColumn()
                      ->addColumn('action', function($row){
                      $btn = '<a class="btn btn-info" href="'.route("products.show",$row->id) .'">Show</a>  
                              <a class="btn btn-primary" href="'.route("products.edit",$row->id).' ">Edit</a>
                              <a class="btn btn-danger" href="'.route("products.destroy",$row->id).'">Delete</a>
                             ';
                  return $btn;
                      })
                      ->rawColumns(['action'])
                      ->make(true);
                  }
             return view('users.index');

        //////////////////////
       // return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);

    }
    
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('success','User deleted successfully');
        return redirect()->route('users.index');
    }


    public function locationform(){
        return view('locationtrack');
        }
     public function locationTrack(Request $request){
        ///AIzaSyBHXWMu2n9neuvFpg4Lnq-L7ZhnnfnfHgw
        /// AIzaSyCrBW_-dZUneHu9WRiaFJ4a9f6k-QhRp2w
        ///sir api :AIzaSyBVpPivRtI0iD2n3iwtBNfdym3ceuT3m-M
        $lat = $request->Latitude;
        $long = $request->Longitude;
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long).'&sensor=false&key=AIzaSyBVpPivRtI0iD2n3iwtBNfdym3ceuT3m-M';
        //$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long).'&sensor=false&key=AIzaSyBHXWMu2n9neuvFpg4Lnq-L7ZhnnfnfHgw';
             //$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long).'&sensor=false&key=AIzaSyCrBW_-dZUneHu9WRiaFJ4a9f6k-QhRp2w';
      
        $address=@file_get_contents($url);
        $json_data[]=json_decode($address,true);  
           //dd($json_data);
        $arrdata[]=$json_data[0]['results'];
        $address = explode(',',$arrdata[0][0]['formatted_address']);
        return view('locationtrack', compact('address'));
    }
}