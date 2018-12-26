<?PHP
header("Content-Type: text/html;charset=gb2312");         //设置编码

session_start();
$uid = $_POST["ID"];//预定义数组_POST取跳转页面传递过来的数据，也就是取text界面中用户名和密码输入的值。把取到的值交给变量$uid
$pwd = $_POST["pwd"];//取到的密码交给变量$pwd


//取到这两个值之后，就要去判断用户名和密码是否匹配成功。

$alen=strlen($uid);
$blen=strlen($pwd);


if($uid == "root" && $pwd == "123"){
	echo "<script>alert('登录管理员账户成功!点击跳转');location.href='update.php';</script>";
}
else
{
//造连接对象
$db = mysqli_connect("localhost","root","123","test");

//判断是否连接成功
mysqli_connect_error()?die("连接失败"):"";


//使用数据库中的login表验证
//写SQL语句
//SQL注入攻击
$sql = "select count(*) from user where username='{$uid}' and password='{$pwd}'";//查询有几条数据可以匹配成功，等于0则没有，大于0则匹配成功。

//执行sql语句
$result = $db->query($sql);//返回结果集对象
$n = $result->fetch_row();//这里的$result是一个对，存到变量$n里面。
if($n[0]>0)//n>0代表能够匹配到，就能够登陆成功。然后跳转到主页面。$n是一个数组，要取里面的元素来判断。
{
	$_SESSION["NAME"] = $uid;

    echo "<script>alert('登录成功!点击跳转');location.href='index.html';</script>";

}
else//如果匹配不成功
{
    echo "<script>alert('帐号或密码不确!');location.href='register.html';</script>";
}
}
 ?>