<html lang="en">  
<head>  
  <title> Example of Add More Field using the Bootstrap and Jquery </title>  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
</head>  
<body>  
  
<div class="container">  
  <div class="panel panel-default">  
    <div class="panel-heading"> Add More Field using the Bootstrap and Jquery </div>  
    <div class="panel-body">  
  
        <form action="action.php" >  
  
        <div class="input-group control-group collapse-add-more">  
          <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">  
          <div class="input-group-btn">   
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>  
          </div>  
        </div>  
  
       
  
        <!-- Copy Fields -->  
        <div class="copy hide">  
          <div class="control-group input-group" style="margin-top:10px">  
            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">  
            <div class="input-group-btn">   
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
            </div>  
          </div>  
        </div>  
        </form>  
    </div>  
  </div>  
</div>  
  
<script type="text/javascript">  
  
    $(document).ready(function() {  
  
      $(".add-more").click(function(){   
          var html = $(".copy").html();  
          $(".collapse-add-more").after(html);  
      });  
  
      $("body").on("click",".remove",function(){   
          $(this).parents(".control-group").remove();  
      });  
  
    });  
  
</script>  
  
</body>  
</html> 