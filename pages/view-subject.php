<?php
session_start();

if (!(isset ($_SESSION ['login']))) {

    header('location:../index.php');
}

include('../config/DbFunction.php');
$obj = new DbFunction();
$rs = $obj->showSubject();


if (isset($_GET['del'])) {

    $obj->del_subject(intval($_GET['del']));


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

    <title>view subject</title>
    <style>
        .center {
            margin: auto;
            width: 80%;
        }
        table {
            margin: auto;
            width:80%;
        }
        table, th, td {
            border: 1px solid black;
            border-radius: 3px;
            border-collapse: collapse;
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

<?php include('leftbar.php') ?>;

<div class="center" style="color: steelblue; font-size: 25px">
    <h4 class="page-header"> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
</div>

<div class="center" style="color: blue; font-size: 22px">
    View Subject
</div>

<table >
    <thead>
    <tr>
        <th>S No</th>
        <th>Subject1</th>
        <th>Subject2</th>
        <th>Subject3</th>
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
            <td><?php echo htmlentities(strtoupper($res->sub1)); ?></td>
            <td><?php echo htmlentities(strtoupper($res->sub2)); ?></td>
            <td><?php echo htmlentities(strtoupper($res->sub3)); ?></td>
            <td>&nbsp;&nbsp;<a href="edit-sub.php?sid=<?php echo htmlentities($res->subid); ?>"><img src="../icon/icon%20edit.jpg" width="25px" height="25px"> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="view-subject.php?del=<?php echo htmlentities($res->subid); ?>"><img src="../icon/delicon.png" width="25px" height="25px"></td>
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
