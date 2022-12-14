
{{$onetmany}}
{{$manytomany1}}
{{$manytomany2}}

@extends('layouts.app')

@section('content')
<!-- OnetoOne -->
<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>One to One Relation</h3></div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sr</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
          </tr>
        </thead>
        <tbody>
       
          <tr>
            <th scope="row">#</th>
            <td>{{$onetoOne->title}}</td>
            <td>{{$onetoOne->category_id}}</td>
            <td>{{$onetoOne->author_id}}</td>    
          </tr>
         
        </tbody>
    </table>
  </div>
</div>
<!-- end onetoOne -->

<!-- OnetoMany -->
<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>One to Many Relation</h3></div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sr</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
          </tr>
        </thead>
        <tbody>
       
         
         
        </tbody>
    </table>
  </div>
</div>
<!-- end onetoMany -->
@endsection