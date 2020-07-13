<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>New Ticket</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    {!! NoCaptcha::renderJs() !!}
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
            </ul>
          </div>
        </nav>
        <div class="container-fluid">
          <h4 class="mt-4">New Ticket</h4>

          <form action="/store" method="post" >
            @csrf
                        <div class="form-group" onsubmit="return submitUserForm();">
                            <label>Project</label>
                            <input type="text" name="project" class="form-control" value="" autocomplete="off">
                            <span class="help-block"></span>
                        </div>
                         <div class="form-group">
                            <label>Tracker</label>
                            <select class="form-control" name="tracker">
                              <option selected disabled >Select Tracker</option>
                              <option value="Bug">Bug</option>
                              <option value="Feature">Feature</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" value="" autocomplete="off">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="">
                            <span class="help-block"></span>
                        </div> 
                        <div class="form-group">
                            <label>Description</label><br>
                            <textarea class="form-control" name="description" id="summary-ckeditor"  rows="10" autocomplete="off"></textarea>
                            
                            
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option>New</option>
                          </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" name="priority">
                            <option>Normal</option>
                            <option disabled>Low</option>
                            <option disabled>High</option>
                          </select>
                            <span class="help-block"></span>
                        </div>
                        <div data-callback="verifyCaptcha" class="g-recaptcha-response" required>
                            
                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    <div id="g-recaptcha-error"></div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                              
                        <a href="{{ route('/') }}" class="btn btn-default btn-danger">Cancel</a>
                        <button type="Submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>
                    <script>
                  function submitUserForm() {
                      var response = grecaptcha.getResponse();
                      if(response.length == 0) {
                          document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
                          return false;
                      }
                      return true;
                  }
                   
                  function verifyCaptcha() {
                      document.getElementById('g-recaptcha-error').innerHTML = '';
                  }
                  </script>

        </div>

      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script>
      function recaptchaCallback() {
    $('#submitBtn').removeAttr('disabled');
};
    </script>
    <script>
      
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }


 </script>

    <script src="{{asset('ckeditor.js') }}"></script>
    <script>
      CKEDITOR.replace('summary-ckeditor',{
        filebrowserUploadUrl:"{{asset('/demo/upload_ckeditor')}}",
        filebrowserBrowseUrl:"{{asset('/demo/file_browser')}}"
      });
    </script>
    <!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
  
    CKEDITOR.replace('editor',{
      filebrowserBrowseUrl:filemanager.ckBrowseUrl
    });
  
</script> -->


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