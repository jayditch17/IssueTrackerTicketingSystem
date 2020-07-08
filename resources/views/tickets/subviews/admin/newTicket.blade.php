<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>New Ticket|Admin</title>
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
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-users') }}">Manage Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-tickets') }}">Manage Tickets</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin-newt') }}">+New Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Log Out</a>
              </li>

            </ul>
          </div>
        </nav>
        <div class="container-fluid">
          <h4 class="mt-4">New Ticket</h4>

          <form action="/storeAdm" method="post">
            @csrf
                        <div class="form-group">
                            <label>Project</label>
                            <select class="form-control" name="project">
                              <option>Select Project</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                         <div class="form-group">
                            <label>Tracker</label>
                            <select class="form-control" name="tracker">
                              <option>Select Tracker</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>
                        <!-- <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="">
                            <span class="help-block"></span>
                        </div> -->
                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea class="form-control" name="description"  id="summary-ckeditor" rows="10"></textarea>
                            
                            
                        </div>
                        <div class="form-group">
                            <label>Assignee</label><br>
                            <input class="form-control" name="assignee"  rows="10">

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option>New</option>
                            <option>In Progress</option>
                            <option>Resolved</option>
                          </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" name="priority">
                            <option>Normal</option>
                            <option></option>
                            <option></option>
                          </select>
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" value="Submit">
                        <!-- <a href="index.php" class="btn btn-default btn-danger">Cancel</a> -->
                        </div>
                    </form>

        </div>

      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script src="{{asset('ckeditor.js') }}"></script>
    <script>
      CKEDITOR.replace('summary-ckeditor')
    </script>
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