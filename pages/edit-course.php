<?php
session_start();
include('../config/DbFunction.php');
$obj = new DbFunction();
if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

$id = $_GET['cid'];

$rs = $obj->showCourse1($id);
$res = $rs->fetch_object();

if (isset($_POST['submit'])) {

    // echo  $id=$_GET['cid'];exit;
    //echo $_POST['course-short'].$_POST['course-full'].$_POST['udate'].$id;exit;
    $obj->edit_course($_POST['course-short'], $_POST['course-full'], $_POST['udate'], $id);

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

    <title></title>
    <style>
        .center {
            margin: auto;
            width: 30%;
        }

        input {
            border: 1px solid #a7a5a5;
            font-size: 18px;
            border-radius: 10px;
        }

        button {
            font-size: 20px;
            color: white;
            background-color: skyblue;
            border-radius: 30px;
        }

        button:hover {
            background-color: green;
        }
    </style>

</head>

<body>
<form method="post">
    <!-- Navigation -->
    <?php include('leftbar.php') ?>;
    <div class="center">
    <div style="font-size: 25px; color:steelblue ">
        <h4> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
    </div>

    <div style="font-size: 22px; color: blue">Edit Course</div>
    <div class="form-group">
        <div >
            <label>Course Short Name<span id="" style="font-size:11px;color:red">*</span> </label>
        </div>
        <div>

            <input class="form-control" name="course-short" id="cshort" value="<?php echo $res->cshort; ?>"
                   required="required" onblur="courseAvailability()">
            <span id="course-availability-status" style="font-size:12px;"></span></div>
    </div>

    <br><br>

    <div class="form-group">
        <div>
            <label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>
        </div>
        <div>
            <input class="form-control" name="course-full" id="cfull" value="<?php echo $res->cfull; ?>"
                   required="required" onblur="coursefullAvail()">
            <span id="course-status" style="font-size:12px;"></span></div>
    </div>

    <br><br>

    <div class="form-group">
        <div>
            <label>Date</label>
        </div>
        <div>
            <input class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" name="udate">

        </div>
    </div>

    <br><br>

    <div class="form-group">

        <div><br><br>
            <button type="submit" class="btn btn-primary" name="submit" value="Update Course">Update Course</button>
        </div>

    </div>
    </div>

    <script src="../bower_components/jquery/dist/jquery.min.js"
            type="text/javascript"></script>
    <script>
        function courseAvailability() {

            jQuery.ajax({
                url: "course_availability.php",
                data: 'cshort=' + $("#cshort").val(),
                type: "POST",
                success: function (data) {
                    $("#course-availability-status").html(data);


                },
                error: function () {
                }
            });
        }

        function coursefullAvail() {

            jQuery.ajax({
                url: "course_availability.php",
                data: 'cfull=' + $("#cfull").val(),
                type: "POST",
                success: function (data) {
                    $("#course-status").html(data);


                },
                error: function () {
                }
            });
        }


    </script>
</form>
</body>

</html>
