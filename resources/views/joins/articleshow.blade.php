@extends('layouts.app')

@section('content')
<div class="bg-primary p-4 text-white text-center mb-3"> <h3>Article Form</h3></div>

<div class="container">
  <div class="row">
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
          @foreach($articles as $article)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->author}}</td>
            <td>{{$article->category}}</td>
          </tr>
         @endforeach
        </tbody>
    </table>
  </div>
</div>
<!-- left -->
<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>Left Join</h3></div>
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
          @foreach($leftdata as $leftdata)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$leftdata->title}}</td>
            <td>{{$leftdata->author}}</td>
            <td>{{$leftdata->category}}</td>    
          </tr>
         @endforeach
        </tbody>
    </table>
  </div>
</div>

<!-- right -->
<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>Right Join</h3></div>
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
          @foreach($rightdata as $rightdata)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$rightdata->title}}</td>
            <td>{{$rightdata->author}}</td>
            <td>x</td>
          </tr>
         @endforeach
        </tbody>
    </table>
  </div>
</div>

<!-- cross -->

<div class="container">
  <div class="row">
    <div class="bg-primary p-2 text-white text-center mb-3"> <h3>Cross Join</h3></div>
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
          @foreach($crossdata as $cross)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$cross->title}}</td>
            <td>{{$cross->author}}</td>
            <td>x</td>
          </tr>
         @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection