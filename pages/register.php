

<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->showCourse();
	$rs1=$obj->showCountry();
	$ses=$obj->showSession();
	$res1=$ses->fetch_object();
	//$res1->session;
	if(isset($_POST['submit'])){
	
     
     $obj->register($_POST['course-short'],$_POST['c-full'],$_POST['fname'],$_POST['mname'],$_POST['lname'],
     	            $_POST['gname'],$_POST['ocp'],$_POST['gender'],$_POST['income'],$_POST['category'],$_POST['ph'],$_POST['nation']

     	             , $_POST['mobno'],$_POST['email'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['padd'],
     	              $_POST['cadd'],$_POST['board1'],$_POST['board2'],$_POST['roll1'],$_POST['roll2'],$_POST['pyear1'],
     	              $_POST['pyear2'],$_POST['sub1'],$_POST['sub2'],$_POST['marks1'],$_POST['marks2'],$_POST['fmarks1'],
     	              $_POST['fmarks2'] ,$_POST['session']);
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>register</title>

</head>

<body>
<form method="post" >
	<div>
	<?php include('leftbar.php');?>
    </div>
		<div>
			<div>
				<div>
					<h4 > <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
			</div>
			<div>
			<div >
			<div >
			<div>Register</div>
			<div>
			<div>
			<div >
			<div class="form-group">
		    <div>
			<label>Select Course<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div>
<select class="form-control" name="course-short" id="cshort"  onchange="showSub(this.value)" required="required" >			
<option VALUE="">SELECT</option>
				<?php while($res=$rs->fetch_object()){?>							
			
                        <option VALUE="<?php echo htmlentities($res->cid);?>"><?php echo htmlentities($res->cshort)?></option>
                        
                        
                    <?php }?>   </select>
										</div>
											
										</div>	
										
								<br><br>
		<div class="form-group">
		<div>
		<label>Select Subject<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div>
 <input class="form-control" name="c-full"  id="c-full" >
       </select>
	</div>
	 </div>	
										
	 <br><br>								
			
			<div class="form-group">
		<div>
		<label>Current  Session<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div>
		
	   <input class="form-control" name="session" value="<?php echo htmlentities($res1->session);?> ">
	 </div>	
										
	 <br><br>								
	
	</div>	
	<br><br>		
		
									
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
			<div>
			<div>
			<div class="panel panel-default">
			<div class="panel-heading">Personal Informations</div>
			<div>
			<div>
			<div>
			<div class="form-group">
		    <div>
			<label>First Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div>
			<input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$">
			</div>
			 <div>
			<label>Middle Name</label>
			
			</div>
			<div>
			<input class="form-control" name="mname">
			</div>
			</div>	
			<br><br>
								
		<div class="form-group">
		    <div>
			<label>Last Name</label>
			</div>
			<div>
			<input class="form-control" name="lname" pattern="[A-Za-z]+$" required="required">
			</div>
			 <div>
			<label>Gender</label>
			
			</div>
			<div>
		 <input type="radio" name="gender" id="male" value="Male"> &nbsp; Male &nbsp;
		 <input type="radio" name="gender" id="female" value="feale"> &nbsp; Female &nbsp;
		 <input type="radio" name="gender" id="other" value="other"> &nbsp; Other &nbsp;
			</div>
			</div>	
	<br><br>		
		     <div class="form-group">
			 <div>
			<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div>
			<input class="form-control" name="gname" required="required" pattern="[A-Za-z]+$">
			</div>
			 <div>
			<label>Occupation</label>
			
			</div>
			<div>
			<input class="form-control" name="ocp" id="ocp" required="required">
			</div>
			</div>	
			<br><br>
					
		     <div class="form-group">
			 <div>
			<label>Family Income<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div>
			<select class="form-control" name="income"  id="income"required="required" >
        <option VALUE="">SELECT</option>
        <option VALUE="200000">200000</option>
        <option value="500000">500000</option>
        <option value="700000">700000</option>
        
       </select>
			</div>
			 <div>
			<label>Category<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div>
			<select class="form-control" name="category"  id="category" required="required" >
        <option VALUE="">SELECT</option>
        <option VALUE="general">General</option>
        <option value="obc">OBC</option>
        <option value="sc">SC</option>
        <option value="st">ST</option>
		<option value="other">Other</option>
       </select>
			</div>
			</div>	
			<br><br>
			
			
					
		     <div class="form-group">
			 <div>
			<label>Physically Challenged<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div>
			<select class="form-control" name="ph"  id="ph"required="required" >
        <option VALUE="">SELECT</option>
        <option VALUE="yes">Yes</option>
        <option value="no">No</option>
               
       </select>
			</div>
			 <div>
			<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div>
			<input class="form-control" name="nation" id="nation" required="required">
			</div>
			</div>	
			<br><br>
			</div>	
			<br><br>
		</div>
      	</div>
		</div>
			
		<div>
			<div>
			<div class="panel panel-default">
			<div class="panel-heading">Contact Informations</div>
			<div>
			<div>
			<div>
			<div class="form-group">
		    <div>
			<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div>
			<input class="form-control" type="number" pattern="[6-9]{10}" name="mobno" required="required">
			</div>
			 <div>
			<label>Email Id</label>
			
			</div>
			<div>
			<input class="form-control"  type="email" name="email" required="required">
			</div>
			</div>	
			<br><br>
								
		<div class="form-group">
		    <div>
			<label>Country</label>
			</div>
			<div>
			<select class="form-control"  name="country" id="country" onchange="showState(this.value)" required="required" >
<option VALUE="">Select Country</option>
				<?php while($res=$rs1->fetch_object()){?>							
			
   <option VALUE="<?php echo htmlentities($res->id);?>"><?php echo htmlentities($res->name)?></option>
                        
                        
                    <?php }?>   </select>
			</div>
			 <div>
			<label>State</label>
			
			</div>
			<div>
 <select name="state" id="state"  class="form-control" onchange="showDist(this.value)" required="required">
        <option value="">Select State</option>
        </select>
			</div>
			
			</div>	
			
	<br><br><br><br>		
		     <div class="form-group">
			 <div>
			<label>City<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div>
           <select name="city" id="dist"  class="form-control" onchange="" required="required">
        <option value="">Select City</option>
		</select>
			</div>
			 <div>
			<label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div>
			<textarea class="form-control" rows="3" name="padd" id="padd"></textarea>
			</div>
			</div>	
			<br><br><br><br>
					
		     
			<br><br>
			
			
					
		     <div class="form-group">
			 <div>
			<label>Correspondence Address<span id="" style="font-size:11px;color:red">*</span>
			
			</div>
			<div>
      <textarea class="form-control" rows="3" name="cadd"  id="cadd"></textarea>
			</div>
			 <div>
			
			
			
			</div>
			<div>
			
			</div>
			</div>	
			<br><br>
			
			
			</div>	
			<br><br>
		</div>
      	</div>
		</div>					
        <div>
			<div>
			<div class="panel panel-default">
			<div class="panel-heading">Academic Informations</div>
			<div>
			<div>
			
			<div>
			<div class="form-group">
		    <div class="panel panel-default">
            <!-- /.panel-heading -->
                        <div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                         <div>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Board<span id="" style="font-size:11px;color:red">*</span>	</label></th>
			</div>   
            <div>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Roll No</th>
			</div>   
              <div>
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;Year Of Passing<span id="" style="font-size:11px;color:red">*</span></th>
			</div>                                 
            </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                  <td><div>
				  <input class="form-control" type="text" name="board1">
				  </div></td>
                  <td><div>
			<input class="form-control" type="text" name="roll1" >
			</div></td>
            <td><div>
			<input class="form-control"  type="text" name="pyear1" >
			</div></td>
                  </tr>

              <tr> 
                  <td><div>
				  <input class="form-control" type="text" name="board2" >
				  </div></td>
                  <td><div>
			<input class="form-control" type="text" name="roll2" >
			</div></td>
            <td><div>
			<input class="form-control"  type="text" name="pyear2" >
			</div></td>
                  </tr>      
                                        
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
			</div>	
			<br><br>					
		  </div>	
			<br><br>			
			<br><br>
			<div>
			<div class="form-group">
		    <div class="panel panel-default">
                        <div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                         <div>
			<th>S.No</th>
			</div>   
            <div>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Subject</th>
			</div>   
              <div>
			 <th>&nbsp;&nbsp;&nbsp;&nbsp;Marks Obtained</th>
			</div>                                 
             <div>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;Full Marks</th>
			</div>                               
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                  <td>1</td>
                  <td><div>
			<input class="form-control"  type="text" name="sub1">
			</div></td>
                  <td><div>
			<input class="form-control"  type="text" name="marks1">
			</div></td>
			                  <td><div>
			<input class="form-control"  type="text" name="fmarks1">
			</div></td>
                  </tr>
				  
	         <tr> 
                  <td>2</td>
                  <td><div>
			<input class="form-control"  type="text" name="sub2">
			</div></td>
                  <td><div>
			<input class="form-control"  type="text" name="marks2">
			</div></td>
			                  <td><div>
			<input class="form-control"  type="text" name="fmarks2">
			</div></td>
                  </tr>			  
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			</div>	
							
		  </div>	
			<br>
		
	<div class="form-group">
	<div>
	</div>
	<div><br><br>
	<input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
	</div>
	</div>			
	</div>
	</div><!--row!-->		
	</div>	
			</div>
		</div>
	</div>
	</form>

	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<script>
function showState(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'id='+val,
	success: function(data){
	  // alert(data);
		$("#state").html(data);
	}
	});
}

function showDist(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'did='+val,
	success: function(data){
	  // alert(data);
		$("#dist").html(data);
	}
	});
	
}



function showSub(val) {
    
    //alert(val);
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'cid='+val,
	success: function(data){
	  // alert(data);
		$("#c-full").val(data);
	}
	});
	
}
</script>



</body>

</html>
