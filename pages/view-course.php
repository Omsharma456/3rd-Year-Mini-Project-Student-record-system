<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

include('../config/DbFunction.php');
$obj = new DbFunction();
$rs = $obj->showCourse();


if (isset($_GET['del'])) {

    $obj->del_course(intval($_GET['del']));


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

    <title>view course</title>
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

<div id="wrapper">

    <?php include('leftbar.php') ?>;

    <nav>
        <div class="center">
            <div>
                <div class="center;" style="color: steelblue; font-size: 25px">
                    <h4 > <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
                </div>
                <div style="font-size: 22px; color: blue">
                    View Course
                </div>
                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>S No</th>
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sn = 1;
                        while ($res = $rs->fetch_object()) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $sn ?></td>
                                <td><?php echo htmlentities(strtoupper($res->cshort)); ?></td>
                                <td><?php echo htmlentities(strtoupper($res->cfull)); ?></td>
                                <td><?php echo htmlentities($res->cdate); ?></td>
                                <td>&nbsp;&nbsp;<a
                                            href="edit-course.php?cid=<?php echo htmlentities($res->cid); ?>"><img
                                                src="../icon/icon%20edit.jpg" width="25px" height="25px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="view-course.php?del=<?php echo htmlentities($res->cid); ?>"><img
                                                src="../icon/delicon.png" width="25px" height="25px"></td>

                            </tr>

                            <?php $sn++;
                        } ?>
                        </tbody>
                    </table>


<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
