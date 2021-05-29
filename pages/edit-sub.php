<?php
session_start();
include('../config/DbFunction.php');
$obj = new DbFunction();
if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

$id = $_GET['sid'];

$rs = $obj->showSubject1($id);
$res = $rs->fetch_object();

if (isset($_POST['submit'])) {

    $id = $_GET['sid'];
    $obj->edit_subject($_POST['sub1'], $_POST['sub2'], $_POST['sub3'], $_POST['udate'], $id);

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
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('leftbar.php') ?>;
    </div>
    <div class="center">
    <div  style="font-size: 25px; color:steelblue ">
            <h4> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
        </div>

    <div style="font-size: 22px; color: blue">Edit Subject</div>


    <div class="form-group">
        <label>Subject1</label>
        <input class="form-control" name="sub1" id="sub1" value="<?php echo $res->sub1; ?>" required="required">
    </div>
    <br><br>
    <label>Subject2</label>


    <input class="form-control" name="sub2" id="sub2" value="<?php echo $res->sub2; ?>" required="required">

    <br><br>
    <class
    ="form-group">
    <label>Subject3</label>

    <input class="form-control" name="sub3" id="sub3" value="<?php echo $res->sub3; ?>" required="required">

    <br><br>
    <div class="form-group">
        <label>Date</label>
    </div>
    <input class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" name="udate">


    <br><br>

    <div class="form-group">
    </div>
    <div><br><br>
        <button type="submit" class="btn btn-primary" name="submit" value="Update Course">Update Subject</button>
    </div>
</div>
</form>
</body>

</html>
