<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

if (isset($_POST['submit'])) {

    include('../config/DbFunction.php');
    $obj = new DbFunction();
    $obj->create_course($_POST['course-short'], $_POST['course-full'], $_POST['cdate']);

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

    <title>add course</title>
    <style>
        .center {
            margin: auto;
            width: 50%;
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
        <?php include('leftbar.php') ?>

        <!--nav-->
    <div class="center">
            <div class="center" style="font-size: 25px; color:steelblue ">
                <h4><b><?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></b></h4>
            </div>
            <div class="center" style="font-size: 18px">
                <div style="font-size: 22px; color: blue">Add Course</div>
                <br>
                <div class="form-group">
                    <div>
                        <label>Course Short Name<span id=""
                                                      style="font-size:11px;color:red">*</span>
                        </label>
                    </div>
                    <div>

                        <input class="form-control" name="course-short" id="cshort"
                               required="required" onblur="courseAvailability()">
                        <span id="course-availability-status" style="font-size:12px;"></span></div>

                </div>

                <br>

                <div >
                    <div>
                        <label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>
                    </div>
                    <div >
                        <input class="form-control" name="course-full" id="cfull"
                               required="required" onblur="coursefullAvail()">
                        <span id="course-status" style="font-size:12px;"></span></div>
                </div>

                <br>

                <div
                    <div>
                        <label>Creation Date</label>
                    </div>
                    <div>
                        <input class="form-control" value="<?php echo date('d-m-Y'); ?>"
                               readonly="readonly" name="cdate">
                    </div>
                </div>


            <br>

            <div class="center">
                <div >
                    <button type="submit" class="btn btn-primary" name="submit"
                           value="Create Course">Create Course</button>
                </div>

            </div>

        </div>
</div>
</form>



    <script>
        function courseAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cshort=' + $("#cshort").val(),
                type: "POST",
                success: function (data) {
                    $("#course-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }

        function coursefullAvail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "course_availability.php",
                data: 'cfull=' + $("#cfull").val(),
                type: "POST",
                success: function (data) {
                    $("#course-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }


    </script>
</form>
</body>

</html>
