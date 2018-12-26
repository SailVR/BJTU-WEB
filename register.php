<?php
$con = mysqli_connect("localhost","root","123");//链接数据库，注意该php版本的链接语句是mysqli_connect（）
 $id=$_POST['ID'];
 $email=$_POST['email'];//通过post方式获取表单数据并存入到$name变量中
 $pwd=$_POST['pwd'];
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
mysqli_select_db( $con,"test"); //注意语法，mysqli_select_db(connection,dbname);
mysqli_query($con,"INSERT INTO student(ID,email,pwd) VALUES('$id','$email','$pwd')"); //注意使用mysqli的相关函数都要加链接数据库的变量

echo "<script type='text/javascript'>alert('注册成功,请登录');</script>";
echo '<script language=javascript>window.location.href="register.html"</script>';
mysqli_close($con);  //函数中要加入参数
?>
