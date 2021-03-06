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
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('/') }}">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('ano-tickets') }}"> Tickets</a>
              </li>
            </ul>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ano-newt') }}">+New Ticket</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{ url('/redirect') }}">Log In</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h4 class="mt-4">Tickets</h4>
      </div>
      <div class="mt-2">
      <form action="/search" method="get" accept-charset="utf-8">
        <div class="input-group">
          <input type="search" name="search" class="form-control">
          <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search</button>
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
