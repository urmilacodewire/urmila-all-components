@extends('layouts.app')

@section('content')
<div class="bg-primary p-4 text-white text-center mb-3"> <h3>Category Form</h3></div>
<form action="{{ url('category'.(isset($cateEdit) ? '/'.$cateEdit->id :	'')) }}" method="POST">
	@csrf
	@method('PUT')
  	<div class="row">
	  	<div class="col-md-6 mb-3">
		    <label for="exampleInputCategory" class="form-label">Category</label>
		    <input type="text" class="form-control" name="name" value="{{ isset($cateEdit->name) ? $cateEdit->name : '' }}" >
	  	 </div>
	  	 <div class="col-md-6 mb-3">
  		<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  	</div>
	</div>
	<div class="row">
	  	<div class="col-md-6 mb-3">
	  		<button type="submit" class="btn btn-primary">Submit</button>
		    <!-- <label for="exampleInputCategory" class="form-label">Category</label>
		    <input type="text" class="form-control" name="name"> -->
	  	 </div>
	  	 <div class="col-md-6 mb-3">
  		
  	</div>
	</div>
</form>


<!-- //////////////////////////////////////// -->
<br>
<br>
<br>
@if(isset($category))
<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>Category Table</h3></div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sr</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
      
       @foreach($category as $category)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>	
            <td>{{$category->name}}</td>  
            <td>
            	<a href="{{url('category/'.$category->id.'/edit')}}" class="btn btn-light"><svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></a>
            	<a href="{{url('category'.$category->id)}}" class="btn btn-light"><svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></a>
            </td>
          </tr>
         @endforeach
      
        </tbody>
    </table>
  </div>
</div>
@endif
@endsection	