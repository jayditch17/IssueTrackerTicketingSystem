<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manage Users|Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
          <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-home') }}">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin-users') }}">Manage Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-tickets') }}">Manage Tickets</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-newt') }}">+New Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container-fluid">
          <h4 class="mt-4">Tickets</h4>
        </div>
        <table class="table table-bordered table-striped table-sm">
          <thead class="table-secondary">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
              @foreach($users as $user)
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>

              <td>{{$user->email}}</td>
              <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
              

              <td>
                
                <a href="{{route('admin.users.edit', $user->id)}}" class='btn btn-info btn-sm'>UPDATE</a>
                <a href="#" class ='btn btn-danger btn-sm'>DELETE</a>
              </td>
              
            </tr>
            @endforeach
            
          </tbody>
        </table>
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