<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body >
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
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin-home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-users') }}">Manage Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-tickets') }}">Manage Tickets</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              
              <li class="nav-item"> 
                <a class="nav-link" href="{{ route('admin-newt') }} ">+New Ticket</a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @csrf
              @method('DELETE')
            </ul>
          </div>
        </nav>
        <div class="container-fluid">
          <h4 class="mt-4"></h4>
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