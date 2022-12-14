<!doctype html>                     
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('resources/js/app.js') }}" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Scripts -->
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #87adbd !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}

.colored-toast .swal2-html-container {
  color: white;
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
               <!--  <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel 8 User Roles and Permissions - ItSolutionStuff.com
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!-- @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li> -->
                            <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li> 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
 <!-- <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button> -->
 <!--  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div> -->
                            </li>
                       <!--  @endguest -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

  
<!--alerts -->
<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-right',
  iconColor: 'white',
  customClass: {
    popup: 'colored-toast'
  },
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true
})

@if(count($errors) > 0)
 @foreach($errors->all() as $error)
        Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '{{ $error }}',
  showConfirmButton: false,
  timer: 1500
})
Toast.fire({
  icon: 'error',
  title: '{{ $error }}'
})
@endforeach
@endif
@if(Session::has('success'))
// Swal.fire({
//   position: 'top-end',
//   icon: 'success',
//   title: "{{ Session::get('success')}}",
//   showConfirmButton: false,
//   timer: 1500   
// })
 Toast.fire({
  icon: 'success',
  title:  "{{ Session::get('success')}}"
})
@endif
@if(Session::has('info'))
//     Swal.fire({
//   position: 'top-end',
//   icon: 'info',
//   title: "{{ Session::get('info')}}",
//   showConfirmButton: false,
//   timer: 1500
// })
Toast.fire({
  icon: 'info',
  title:  "{{ Session::get('info')}}"
})
@endif
@if(Session::has('warning'))
  
// Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
// })
@endif
@if(Session::has('error'))
//     Swal.fire({
//   position: 'top-end',
//   icon: 'error',
//   title: "{{ Session::get('error')}}",
//   showConfirmButton: false,
//   timer: 1500
// })
Toast.fire({
  icon: 'error',
  title:  "{{ Session::get('error')}}"
})
@endif
</script>
@yield('script')
</body>
</html>
