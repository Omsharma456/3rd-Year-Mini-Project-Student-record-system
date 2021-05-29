<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showstudents();
   

	if(isset($_GET['del']))
    {    
         
		  $obj->del_std(intval($_GET['del']));
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
    <title>View Students</title>
    <style>
        .center {
            margin: auto;
            width: 60%;
        }
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid black;
            border-radius: 3px;
            border-collapse: collapse;
        }
        th{
            background-color: skyblue;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }
        tr:hover {
            background-color: lightblue;
        }
    </style>
    
</head>

<body>

    <div>

     <?php include('leftbar.php')?>;

           
         <nav>
        <div>
            <div>
                <div>
                   <h4> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                </div>
            </div>

                        <div>
                            View Students
                        </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th>RegNo</th>
											<th>Name</th>
                                            <th>Email</th>
                                            <th>MobNO</th>
											<th>Course</th>
											<th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){
									 
	                                  $c=$res->course;
									  $cname=$obj->showCourse1($c);
									  $res1=$cname->fetch_object();
									  
									 ?>	
                                        <tr class="odd gradeX">
                              <td><?php echo $sn?></td>
                              <td><?php echo htmlentities( strtoupper($res->regno));?></td>
             <td><?php echo htmlentities(strtoupper($res->fname." ".$res->mname." ".$res->lname));?></td>
       <td><?php echo htmlentities(strtoupper($res->emailid));?></td>
	  <td><?php echo htmlentities($res->mobno);?></td>
	  <td><?php echo htmlentities(strtoupper($res1->cshort));?></td>
      <td><?php echo htmlentities(strtoupper($res->subject));?></td>											  
      <td>&nbsp;&nbsp;<a href="edit-std.php?id=<?php echo htmlentities($res->id);?>">
	 <img src="../icon/icon%20edit.jpg" width="25px" height="25px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="view.php?del=<?php echo htmlentities($res->id); ?>">
          <img src="../icon/delicon.png" width="25px" height="25px">
	  </td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
