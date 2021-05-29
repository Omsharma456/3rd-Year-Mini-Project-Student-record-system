    <?php
    session_start();
    include('../config/DbFunction.php');
    $obj = new DbFunction();
    $rs = $obj->showCourse();
    $rs1 = $obj->showCourse();
    if (!(isset ($_SESSION ['login']))) {

        header('location:../index.php');
    }
    if (isset($_POST['submit'])) {

        $obj = new DbFunction();

        $obj->create_subject($_POST['course-short'], $_POST['course-full'], $_POST['sub1'], $_POST['sub2'], $_POST['sub3']);

    }


    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">

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
            input,select {
                border: 1px solid gray;
                font-size: 18px;
                border-radius: 10px;
            }
            button{
                font-size: 20px;
                color: white;
                background-color: skyblue;
                border-radius: 10px;
            }
            button:hover {
                background-color: green;
            }
        </style>
    </head>

    <body>
    <form method="post">

        <?php include('leftbar.php') ?>;

    <div class="center">
        <div class="center;" style="color: steelblue; font-size: 25px">
                <h4 class="page-header"> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
        </div>

        <div style="font-size: 22px; color: blue">Add Subject</div>
        <br>
        <div class="form-group">
            <div>
                <label>Course Short Name<span id="" style="font-size:11px;color:Red">*</span> </label>
            </div>

            <div>
                <select class="form-control" name="course-short" id="cshort" onchange="courseAvailability()"
                        required="required">
                    <option VALUE="">SELECT</option>
                    <?php while ($res = $rs->fetch_object()) { ?>

                    <option VALUE="<?php echo htmlentities($res->cid); ?>"><?php echo htmlentities($res->cshort) ?></option>


                <?php } ?></div>

            </select>
            <span id="course-availability-status" style="font-size:12px;"></span>
        </div>
        <br>
        </div>

        <div class="form-group">
            <label>Course Full Name<span id="" style="font-size:11px;color:red">*</span></label>

            <div>
                <select class="form-control" name="course-full" id="cfull" required="required" onchange="coursefullAvail()">
                    <option VALUE="">SELECT</option>
                    <?php while ($res1 = $rs1->fetch_object()) { ?>

                        <option VALUE="<?php echo htmlentities($res1->cfull); ?>"><?php echo htmlentities($res1->cfull) ?></option>


                    <?php } ?>
                </select>
                <span id="course-status" style="font-size:12px;"></span>
            </div>
        </div>
        <br>

        <div class="form-group">
            <div>
                <label>Subject1</label><br>
                <input class="form-control" name="sub1">
            </div>
        </div>
        <br>

        <div class="form-group">
            <div>
                <label>Subject2</label>
            </div>
            <div>
                <input class="form-control" name="sub2">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div>
                <label>Subject3</label>
            </div>
            <div>
                <input class="form-control" name="sub3">

            </div>
        </div>
        </div>
        <br>

        <div class="form-group center">

            <div>
                <button type="submit" class="btn btn-primary" name="submit" value="Add Subject">Add Subject</button>
            </div>

        </div>
    </div>
    </form>


        <script>
            function coursefullAvail() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "course_availability.php",
                    data: 'cfull1=' + $("#cfull").val(),
                    type: "POST",
                    success: function (data) {
                        $("#course-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function () {
                    }
                });
            }

            function courseAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "course_availability.php",
                    data: 'cshort1=' + $("#cshort").val(),
                    type: "POST",
                    success: function (data) {
                        $("#course-availability-status").html(data);
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
