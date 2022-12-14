<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

//use App\Exports\productExport;
use DB;
use Carbon\Carbon;

class productExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($data){
    	$this->data = $data;
    }
    public function collection()
    {
         $data  = $this->data;
        
      $query= DB::table('products')->get();

        if($data['to_date']){
           $query = $query->whereBetween('created_at', [$data['from_date'], $data['to_date']]);
        }
       // dd($query);  
        $export[] = [
            'sno'     => 'S.No',
            'name'  => 'Product Name',
            'detail'  => 'Detail',
            'created_at'  => 'Date'
        ];

        $i = 0;
        foreach($query as $key){
            $export[] = [
                'sno' => $i++,
                'name' => $key->name,
                'detail' => $key->detail,
                'created_at' => Carbon::parse($key->created_at)->format('d-M-Y')
            ];
        }
     return collect($export);
      
    }
}
