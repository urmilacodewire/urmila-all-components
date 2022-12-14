@extends('layouts.app')

@section('content')
<div class="bg-primary p-4 text-white text-center mb-3"> <h3>Article Form</h3></div>
<form action="{{url ('article')}}" method="post" >
  <div class="row">
  <div class="col-md-6 mb-3">
    <label for="exampleInputTitle" class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
    </div>
  <div class="col-md-6 mb-3">
    <label for="exampleInputArticle" class="form-label">Article</label>
    <input type="text" class="form-control" name="article">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label" for="exampleCategory1">Category</label>
    <select type="text" class="form-control" name="Category">
      <option>Select Any One</option>
      @foreach($category as $cate)
      <option value="{{$cate->id}}">{{$cate->name}}</option>
      @endforeach
    </select>
  </div> <div class="col-md-6 mb-3">
    <label class="form-label" for="exampleCategory1">Author</label>
    <select type="text" class="form-control" name="author">
      <option>Select Any One</option>
      @foreach($authors as $authors)
      <option value="{{$authors->id}}">{{$authors->name}}</option>
       @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection