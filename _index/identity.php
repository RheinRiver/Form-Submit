<?php
$id = $_POST["id"];

$ID = array(
"a5WbOFP",
"oqVX5ko","EfIdaQL","NI87iGR","m4FBvUa",
"IXqkQIG","SQnVGkA","ScYzgv3","NuX41B1",
"px7KZvI","7N7xhJH","smS9ME8","trqgiWv",
"toMn8md","VfRcsH9","XjgZYm6","wY681GH",
"6ipRjAZ","52S2zoZ","2HcIXw3"
);

$URL = array(
"http://101.200.152.175:80/Project-01/_index/chief_index.html",
"http://101.200.152.175:80/Project-01/_index/1.html",
"http://101.200.152.175:80/Project-01/_index/2.html",
"http://101.200.152.175:80/Project-01/_index/3.html",
"http://101.200.152.175:80/Project-01/_index/4.html",
"http://101.200.152.175:80/Project-01/_index/5.html",
"http://101.200.152.175:80/Project-01/_index/6.html",
"http://101.200.152.175:80/Project-01/_index/7.html",
"http://101.200.152.175:80/Project-01/_index/8.html",
"http://101.200.152.175:80/Project-01/_index/9.html",
"http://101.200.152.175:80/Project-01/_index/10.html",
"http://101.200.152.175:80/Project-01/_index/11.html",
"http://101.200.152.175:80/Project-01/_index/12.html",
"http://101.200.152.175:80/Project-01/_index/13.html",
"http://101.200.152.175:80/Project-01/_index/14.html",
"http://101.200.152.175:80/Project-01/_index/15.html",
"http://101.200.152.175:80/Project-01/_index/16.html",
);


for($x=0; $x<20; $x++) {
  if($id == $ID[$x]) {
		break;
  }
}

if ($x>18)
{
	echo "身份认证失败, 1秒后自动返回";
	header("refresh:0.5; url = http://101.200.152.175:80/Project-01/_index/identity.html");
}
else
{
	echo "身份认证成功, 1秒后自动跳转";
	header("refresh:0.5; url = $URL[$x]");
}


?>