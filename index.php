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
	$result = mysql_query("select * from content order by id asc");
?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>留言板</title>

  <meta name="renderer" content="webkit">

  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="assets/i/favicon.png">

  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Content"/>
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">

  <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <link rel="stylesheet" href="assets/css/amazeui.min.css">
  <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>

<header class="am-topbar">
	<h1 class="am-topbar-brand title" >
		<p class="title-text"><a href="#">留言板</a></p>
	</h1>
</header>

<div class="am-g">
	<?php while($row = mysql_fetch_assoc($result)){
			
	
	?>
	<div class="am-u-sm-12 " id="panel-box">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">
				<h3 class="am-panel-title"><?=$row['title'];?></h3>
			</div>
			<div class="am-panel-bd">
				<?=$row['message']; ?>
			</div>
		</div>		
	</div>
	<?php }?>
	<div style="height:1500px;"></div>

</div>
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default navbar">
	<div class="am-u-sm-12">
		<div class="sumain">
			留言标题
			<input type="text" name="title" id="title" class="content-title" placeholder="请输入标题" required="true"></input>
			<textarea class="inputarea" name="message" id="message" placeholder="在这里输入你要说的话..." autofocus="true" required="true"></textarea>
		</div>
	</div>
	<div class="am-u-sm-12">
		<div class="am-u-sm-10 subar"></div>
		<div class="am-u-sm-2 subutton-box am-btn am-btn-primary " id="submit"><p class="am-vertical-align-middle">提　交</p></div>
	</div>
</div>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="assets/js/app.js"></script>
<script src="assets/js/amazeui.min.js"></script>
</body>
</html>
