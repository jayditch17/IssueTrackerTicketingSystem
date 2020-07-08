<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Show Ticket-Moderator</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  </head>
  <body style='max-width: 50%;
  margin: auto;'>
    <div class="d-flex " id="wrapper">
      <div class="container-fluid">
      <!-- Page Content -->
      @foreach($tickets as $row)
      <form action="{{action('TicketsController@update', $row->id)}}" method="post" accept-charset="utf-8">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Project</label>
          <select class="form-control" name="project" >
            <option value="{{($row->project)}}">Select Project</option>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>Tracker</label>
          <select class="form-control" name="tracker">
            <option value="{{($row->tracker)}}">Select Tracker</option>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>Subject</label>
          <input type="text" name="subject" class="form-control" value="{{($row->subject)}}">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="{{($row->email)}}">
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>Description</label><br>
          <textarea class="form-control" name="description"  id="summary-ckeditor" rows="10" value="">{{($row->description)}}</textarea>
          
          
        </div>
        <div class="form-group">
          <label>Assignee</label><br>
          <input class="form-control" name="assignee" value="{{($row->assignee)}}">
          <span class="help-block"></span>
          
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status">
            <option value="{{($row->project)}}">New</option>
            <option>In Progress</option>
            <option>Resolved</option>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <label>Priority</label>
          <select class="form-control" name="priority">
            <option value="{{($row->project)}}">Normal</option>
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
      @endforeach
    </div>
  </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Menu Toggle Script -->
  </body>
</html>