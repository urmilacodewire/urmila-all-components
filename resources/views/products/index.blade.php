@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
                
            </div>
        </div>
    </div>
    <div class="filter-export bg-dark my-5 text-white p-1">
        <div class="row">
            <div class="col-md-10">
                <!-- filter -->
             <form action="{{route('List')}}" method="get">
                <div class="col-md-12 row"> 
                    <div class="col-md-4">
                        <label>From</label>
                        <input type="date" name="from_date" class="form-control"> 
                    </div>

                    <div class="col-md-4">
                        <label>To</label>
                        <input type="date" name="to_date" class="form-control"> 
                    </div>  
                        
                    <div class="col-md-4 mt-4 ">
                        <button type='submit' class="btn btn-primary">Submit</button>
                        <a href="{{route('List')}}" class="btn btn-danger">Reset</a>
                    </div>  
                </div>  
                    </form>  
                     <!-- end filter -->
            </div>
            <div class="col-md-2">
                <form action="{{route('Export')}}" method="get" enctype="multipart/form-data" class="pr-5 mb-5">
                @csrf
                <input type="hidden" name="from_date" value="{{$request['from_date'] ?? null}}">
                <input type="hidden" name="to_date" value="{{$request['to_date'] ?? null}}">
                <br>
                <button type="submit" class="btn btn-warning rounded-3">Export</button>
            </form>

            </div>
        </div>
    </div>
 
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
  

    <table class="table table-bordered data-table" id="data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="200px">Action</th>
        </tr>
       <thead>
    </table>

<!-- <script>
var table
$(document).ready(function (){
    table = $('#data-table').DataTable({
        'scrollX':true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ URL::to('products.index') }}",
            data: function (d) {
                d.from_date = '{{$request['from_date'] ?? null}}',
                d.to_date = '{{$request['to_date'] ?? null}}'
            }
        },
        //order: [[6, "desc"]],
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'created_at', name: 'created_at',visible:false},
        ],
    });

</script>
 -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{{ route('products.index') }}",
            data: function (d) {
                d.from_date = '{{$request['from_date'] ?? null}}',
                d.to_date = '{{$request['to_date'] ?? null}}'
            }
        },
        //type:"POST",
        //order: [[6, "desc"]],
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    })
    //alert();
    
  });

</script>
@endsection

