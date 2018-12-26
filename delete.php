<?php 
$con = mysqli_connect("localhost", "root", "123");
$ID = $_POST['ID'];
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysqli_query($con, "set names utf8");
mysqli_select_db($con, "test");
$sql = "SELECT * FROM student where ID = '$ID'";

$retval = mysqli_query($con, $sql);

if ($retval === true) {
    echo "<script type='text/javascript'>alert('删除成功');</script>";
} else {
    echo "<script type='text/javascript'>alert('删除失败');</script>" . $sql;
}

mysqli_close($con);
?> 