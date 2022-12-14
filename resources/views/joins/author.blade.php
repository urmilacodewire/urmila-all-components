@extends('layouts.app')

@section('content')
<div class="bg-primary p-4 text-white text-center mb-3"> <h3>Author Form</h3></div>
<form action="" method="post" enctype="multipart/">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="exampleInputTitle" class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection