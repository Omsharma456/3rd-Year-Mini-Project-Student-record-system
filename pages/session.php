<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showSession();
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view course</title>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
        <div id="page-wrapper">
                   <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
            </div>
                        <div>
                            View Session
                        </div>
                        <div>
                            
                            <div class="form-group">
		    
			
			<label>Session<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
				  <?php while($res=$rs->fetch_object()){
				   if($res->status==1){
				  ?>
		 <input type="radio" name="gender" id="male" value="<?php echo $res->session;?>" checked required="required">
		 &nbsp;&nbsp;<?php echo $res->session;?> <br>
		<?php  } ?>
		
		 <input type="radio" name="gender" id="male" value="<?php echo $res->session;?>" checked required="required">
		 &nbsp;&nbsp;<?php echo $res->session;?> <br>
		 
		 <?php }?>
			</div>         
                 
<input type="submit" class="btn btn-primary" name="submit" value="Update Session">
				 </div>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
