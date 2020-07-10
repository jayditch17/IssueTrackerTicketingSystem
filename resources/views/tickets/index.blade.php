<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Issue Tracker</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('ano-tickets') }}">Tickets</a>
              </li>
            </ul> -->
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('ano-newt') }}">+New Ticket</a>
              </li>
              <li class="nav-item">
                <!-- <a class="dropdown-item" href="{{ url('/redirect') }}">Login with Google</a> -->
                <div class="text-center">
  <a href="" class="nav-link" data-toggle="modal" data-target="#orangeModalSubscription">Log In</a>
</div>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container-fluid">
          <h4 class="mt-4">Tickets</h4>
        </div>
        <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Log In With Existing Account</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="md-form">
          
          <label>Email</label>
          <input type="text" id="email" name="email" class="form-control validate">
          
        </div>

        <div class="md-form">
          <label data-error="wrong" data-success="right" for="form2">Password</label>
          <input type="password" id="password" name="password" class="form-control validate">
          
        </div><br>
         <button type="submit" class="btn btn-success btn-block" name="signin">{{ __('Login') }}</button>
      </div>
    </form>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <h5 class="modal-title white-text w-100 font-weight-bold py-2 text-center">OR</h5>
        <a href="{{ url('/redirect') }}" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
       
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
        <div class="">
          <form action="/search" method="get" accept-charset="utf-8">
            <div class="input-group">
              <input type="search" name="search" class="input-control ml-auto mt-1 mt-lg-0t" placeholder="Search...">
              <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
              </span>
            </div>
            
          </form>
        </div>
        <table class="table table-bordered table-striped table-sm">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Project</th>
              <th>Tracker</th>
              <th>Status</th>
              <th>Priority</th>
              <th>Subject</th>
              <th>Assignee</th>
              <th>Updated</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
              @foreach($tickets as $row)
              <td>{{$row->id}}</td>
              <td>{{$row->project}}</td>
              <td>{{$row->tracker}}</td>
              <td>{{$row->status}}</td>
              <td>{{$row->priority}}</td>
              <td>{{$row->subject}}</td>
              <td>{{$row->assignee}}</td>
              <td>{{$row->updated}}</td>
              <td>
                <a href="{{action('TicketsController@showAny', $row->id)}}" class='btn btn-info btn-sm'>View</a>
                
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $tickets->links() }}
        </div>
        
        
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>

<?php

//$conn = mysqli_connect("localhost","root","","tickets_db");

// if (isset($_POST["signin"])) {
//   # code...
//   $email = $_POST["email"];
//   $password = $_POST["password"];
//   $query = "SELECT * FROM users WHERE email='$email' OR password='$password'";

//   $result = mysqli_query($conn, $query);
//   if (mysqli_num_rows($result) > 0) {
//     # code...
//     while ($row = mysqli_fetch_assoc($result)) {
//       # code...
//       if (($row["role"] == "moderator")) {
//        return redirect('/moderator-home');
//       }else if (($row["role"] == "admin")) {
//        print('admin');
//       }else{
//         print('failed');
//       }
//     }
// }
// }
?>