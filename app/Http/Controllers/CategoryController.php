<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        $data['category'] = Category::All();
        // $data = Category::All();
        //dd($data);
        return view('joins.category', $data);
    }

    
    public function create()
    {
        return view('joins.category');
    }

   
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        Session::flash('success' , 'Category is inserted successfully.');
       return back();
    }

    
    public function show($id)
    {
        $data['category'] = Category::All();
       return view('joins.category',$data);
    }

    
    public function edit($id)
    {
        $data['cateEdit'] = DB::table('categories')->where('id',$id)->first();
        //dd($data);
        return view('joins.category',$data);

    }

    
    public function update(Request $request, $id)
    {
         $request->validate([
                'name' => 'required'
        ]);
        Category::where('id' , $id)->update([
            'name' => $request->name
        ]);
        Session::flash('success' , 'Category is Updated successfully.');
       return view('joins.category');
    }

    
    public function destroy($id)
    {
        //
    }
}
