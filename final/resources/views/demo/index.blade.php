<textarea class="form-control" name="description" id="summary-ckeditor"  rows="10" autocomplete="off"></textarea>

<script src="{{asset('ckeditor.js') }}"></script>
    <script>
      CKEDITOR.replace('summary-ckeditor',{
        filebrowserUploadUrl:"{{asset('/demo/upload_ckeditor')}}",
        filebrowserBrowseUrl:"{{asset('/demo/file_browser')}}"
      });
    </script>

