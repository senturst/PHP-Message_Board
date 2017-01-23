<?php
function mysql_conn($ip,$name,$pass,$db,$char)
{
	$conn = mysql_connect($ip,$name,$pass);
	if($conn)
	{
		mysql_select_db($db,$conn);
		$result = mysql_query("SET NAMES $char");
		if($result){}else{echo "error";}
		echo mysql_error();
	}
	else
	{
		bug(mysql_error());
		echo "<script>alert('连接失败!');</script>";
	};
	return;
}

mysql_conn("localhost","root","","test","UTF8");
$title = $_POST['title'];
$message = $_POST['message'];
$sql = "insert content(title,message) values('$title','$message')";
$result = mysql_query($sql);
if($result)
{
		echo "<script>alert('写入成功!');</script>";
		return;
}
else
{
		echo "<script>alert('写入失败!');</script>";
		return;
}
?>