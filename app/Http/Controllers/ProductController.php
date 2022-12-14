<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Exports\productExport;
    
class ProductController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    
    }
    
    public function index(Request $request)
    {
        
       

         // return DataTables::of($data)

         //    ->addIndexColumn()
         //    ->addColumn('action', function ($row) {
         //        $actionBtn = '';
         //        $actionBtn .= '<a href="'. route('products.show',$row->id) .'" class="btn btn-info btn-sm mr-1">View</a>';
         //        $actionBtn .= '<a href="'. route('products.edit',$row->id) .'" class="btn btn-success btn-sm mr-1">Edit</a>';
         //        $actionBtn .= '<a href="'. route('products.destroy',$row->id) .'" class="delete btn btn-danger btn-sm mr-1">Delete</a>';
         //        return $actionBtn;
         //    })
         //    ->rawColumns(['action','status'])
         //    ->make(true);

        if ($request->ajax()) {
             $data = Product::orderBy('id' , 'DESC');
      
        if($request['to_date']){
            $data->whereBetween('created_at', [$request['from_date'], $request['to_date']]);
            }
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
         return view('products.index');

    }

     public function productList(Request $request)
    {
        $data['request'] = $request->all();
        //dd($request->all());
        return view('products.index', $data);
    }
    
     public function productExport(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    public function create()
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product::create($request->all());
       return redirect()->route('products.index')->with('Success', 'Product is created Successfully.');
                        ;
    }
    
    public function show(Product $product)
    {

        return view('products.show',compact('product'));
    }
    
    
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    Session::flash('success','Product is updated successfully.');
        return redirect()->route('products.index');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

     public function prodExport(Request $request){
        $data = $request->all();
        //dd($data);
        return Excel::download(new productExport($data) , 'productexcel.xlsx');
     }
}