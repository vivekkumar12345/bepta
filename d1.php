<html>
<head>
<title>Bootstrap Grid</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container" style="padding:150px;">
 <!----modal starts here--->
<div id="modal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tutorialsplane Modal Demo</h4>
            </div>
            <div class="modal-body" id= "modal-body">
                <p>Here the description starts here........</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>
<!--Modal ends here--->

<button type="button" class="btn btn-info btn-lg open-modal" >Click Here To Open Modal</button>
</div>
<script type="text/javascript">
   $(document).on("click", ".open-modal", function () {
   var x = new Date(); 
     var myHeading = "<p>I Am Added Dynamically </p>";
     $("#modal-body").html(myHeading + x);   
     $('#modal').modal('show');
    });

</script>
</body>
</html>