@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

<!-- 
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
 -->

<table class="table table-bordered" id="dt1">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge text-bg-warning">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
       <!-- <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger delete-confirm" role="button">Delete</a> -->
       <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat delete-confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
       <!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger ','delete-confirm']) !!}
             {!! Form::close() !!} -->
    </td>
  </tr>
 @endforeach
</table>
{!! $data->render() !!}
@endsection

@section('script')
<script>
   $(document).ready(function() {
            $('#dt1').DataTable()
            alert()
        })
$('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      var form =  $(this).closest("form");
          var name = $(this).data("name");
      // swal.fire({
      //     title: 'Are you sure?',
      //     text: 'This record and it`s details will be permanantly deleted!',
      //     icon: 'warning',
      //     buttons: ["Cancel", "Yes!"],
      //     }) .then((willDelete) => {
      //       if (willDelete) {
      //         form.submit();
      //       }
      //     });


          Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
   
  }
})
     });
     </script>
@endsection