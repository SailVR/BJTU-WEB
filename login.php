<?php
$con = mysqli_connect("localhost", "root", "123");
$ID = $_POST['ID'];
$pwd = $_POST['pwd'];
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysqli_query($con, "set names utf8");
mysqli_select_db($con, "test");
$sql = "SELECT * FROM student where ID = '$ID'";
$retval = mysqli_query($con, $sql);
if (!$retval) {
  die('无法读取数据: ' . mysqli_error($con));
}
$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
if ($row['ID'] == "") {
  echo "<p style=" . "text-align:center" . ">没有该用户</p>";
} else if ($pwd != $row['pwd']) {
  echo "<p style=" . "text-align:center" . ">密码不正确</p>";
} else {
  echo "<script type='text/javascript'>alert('登录成功');</script>";
  echo '<script language=javascript>window.location.href="index.html"</script>';
  Session_Start();
  $_SESSION["ID"] = $_POST["ID"];
}
mysqli_close($con);
?>